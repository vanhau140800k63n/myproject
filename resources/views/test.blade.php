@extends('layouts.master')
@section('head')
    <style>
        .person {
            position: absolute;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }

        .bar_box {
            width: 500px;
            height: 100vh;
            border: 10px solid rgb(103, 97, 97);
            margin: 100px auto;
        }

        .name {
            text-align: center;
            border: 1px solid rgb(121, 112, 112);
            border-radius: 5px;
            padding: 2px 5px;
            font-weight: 500;
            font-size: 10px
        }
    </style>
    <script src="{{ asset('test/app.js') }}"></script>
    <script src="{{ asset('test/connection.js') }}"></script>
    <script src="{{ asset('test/socket.io.min.js') }}"></script>
@endsection
@section('content')
    <div class="bar_box">
        <div class="person" id="">
            <div class="name">John</div>
            <img class="img" src="image/output-onlinegiftools.gif" width="50">
        </div>
    </div>
    <script>
        class TikTokIOConnection {
            constructor(backendUrl) {
                this.socket = io(backendUrl);
                this.uniqueId = null;
                this.options = null;

                this.socket.on('connect', () => {
                    console.info("Socket connected!");

                    // Reconnect to streamer if uniqueId already set
                    if (this.uniqueId) {
                        this.setUniqueId();
                    }
                })

                this.socket.on('disconnect', () => {
                    console.warn("Socket disconnected!");
                })

                this.socket.on('streamEnd', () => {
                    console.warn("LIVE has ended!");
                    this.uniqueId = null;
                })

                this.socket.on('tiktokDisconnected', (errMsg) => {
                    console.warn(errMsg);
                    if (errMsg && errMsg.includes('LIVE has ended')) {
                        this.uniqueId = null;
                    }
                });
            }

            connect(uniqueId, options) {
                this.uniqueId = uniqueId;
                this.options = options || {};

                this.setUniqueId();

                return new Promise((resolve, reject) => {
                    this.socket.once('tiktokConnected', resolve);
                    this.socket.once('tiktokDisconnected', reject);

                    setTimeout(() => {
                        reject('Connection Timeout');
                    }, 15000)
                })
            }

            setUniqueId() {
                this.socket.emit('setUniqueId', this.uniqueId, this.options);
            }

            on(eventName, eventHandler) {
                this.socket.on(eventName, eventHandler);
            }
        }

        let backendUrl = location.protocol === 'file:' ? "https://tiktok-chat-reader.zerody.one/" : undefined;
        let connection = new TikTokIOConnection(backendUrl);

        // Counter
        let viewerCount = 0;
        let likeCount = 0;
        let diamondsCount = 0;

        // These settings are defined by obs.html
        if (!window.settings) window.settings = {};

        $(document).ready(() => {

            connect();

            if (window.settings.username) connect();
        })

        function connect() {
            let uniqueId = 'a';
            if (uniqueId !== '') {

                $('#stateText').text('Connecting...');

                connection.connect(uniqueId, {
                    enableExtendedGiftInfo: true
                }).then(state => {
                    $('#stateText').text(`Connected to roomId ${state.roomId}`);

                    // reset stats
                    viewerCount = 0;
                    likeCount = 0;
                    diamondsCount = 0;
                    updateRoomStats();

                }).catch(errorMessage => {
                    $('#stateText').text(errorMessage);

                    // schedule next try if obs username set
                    if (window.settings.username) {
                        setTimeout(() => {
                            connect(window.settings.username);
                        }, 30000);
                    }
                })

            } else {
                alert('no username entered');
            }
        }

        // Prevent Cross site scripting (XSS)
        function sanitize(text) {
            return text.replace(/</g, '&lt;')
        }

        function updateRoomStats() {
            $('#roomStats').html(
                `Viewers: <b>${viewerCount.toLocaleString()}</b> Likes: <b>${likeCount.toLocaleString()}</b> Earned Diamonds: <b>${diamondsCount.toLocaleString()}</b>`
                )
        }

        function generateUsernameLink(data) {
            return `<a class="usernamelink" href="https://www.tiktok.com/@${data.uniqueId}" target="_blank">${data.uniqueId}</a>`;
        }

        function isPendingStreak(data) {
            return data.giftType === 1 && !data.repeatEnd;
        }

        /**
         * Add a new message to the chat container
         */
        function addChatItem(color, data, text, summarize) {
            let container = location.href.includes('obs.html') ? $('.eventcontainer') : $('.chatcontainer');

            if (container.find('div').length > 500) {
                container.find('div').slice(0, 200).remove();
            }

            container.find('.temporary').remove();;

            container.append(`
        <div class=${summarize ? 'temporary' : 'static'}>
            <img class="miniprofilepicture" src="${data.profilePictureUrl}">
            <span>
                <b>${generateUsernameLink(data)}:</b> 
                <span style="color:${color}">${sanitize(text)}</span>
            </span>
        </div>
    `);

            container.stop();
            container.animate({
                scrollTop: container[0].scrollHeight
            }, 400);
        }

        /**
         * Add a new gift to the gift container
         */
        function addGiftItem(data) {
            let container = location.href.includes('obs.html') ? $('.eventcontainer') : $('.giftcontainer');

            if (container.find('div').length > 200) {
                container.find('div').slice(0, 100).remove();
            }

            let streakId = data.userId.toString() + '_' + data.giftId;

            let html = `
        <div data-streakid=${isPendingStreak(data) ? streakId : ''}>
            <img class="miniprofilepicture" src="${data.profilePictureUrl}">
            <span>
                <b>${generateUsernameLink(data)}:</b> <span>${data.describe}</span><br>
                <div>
                    <table>
                        <tr>
                            <td><img class="gifticon" src="${data.giftPictureUrl}"></td>
                            <td>
                                <span>Name: <b>${data.giftName}</b> (ID:${data.giftId})<span><br>
                                <span>Repeat: <b style="${isPendingStreak(data) ? 'color:red' : ''}">x${data.repeatCount.toLocaleString()}</b><span><br>
                                <span>Cost: <b>${(data.diamondCount * data.repeatCount).toLocaleString()} Diamonds</b><span>
                            </td>
                        </tr>
                    </tabl>
                </div>
            </span>
        </div>
    `;

            let existingStreakItem = container.find(`[data-streakid='${streakId}']`);

            if (existingStreakItem.length) {
                existingStreakItem.replaceWith(html);
            } else {
                container.append(html);
            }

            container.stop();
            container.animate({
                scrollTop: container[0].scrollHeight
            }, 800);
        }


        // viewer stats
        connection.on('roomUser', (msg) => {
            if (typeof msg.viewerCount === 'number') {
                viewerCount = msg.viewerCount;
                updateRoomStats();
            }
        })

        // like stats
        connection.on('like', (msg) => {
            if (typeof msg.totalLikeCount === 'number') {
                likeCount = msg.totalLikeCount;
                updateRoomStats();
            }

            if (window.settings.showLikes === "0") return;

            if (typeof msg.likeCount === 'number') {
                addChatItem('#447dd4', msg, msg.label.replace('{0:user}', '').replace('likes',
                    `${msg.likeCount} likes`))
            }
        })

        // Member join
        let joinMsgDelay = 0;
        connection.on('member', (msg) => {
            if (window.settings.showJoins === "0") return;

            let addDelay = 250;
            if (joinMsgDelay > 500) addDelay = 100;
            if (joinMsgDelay > 1000) addDelay = 0;

            joinMsgDelay += addDelay;

            setTimeout(() => {
                joinMsgDelay -= addDelay;
                addChatItem('#21b2c2', msg, 'joined', true);
            }, joinMsgDelay);
        })

        // New chat comment received
        connection.on('chat', (msg) => {
            if (window.settings.showChats === "0") return;

            addChatItem('', msg, msg.comment);
        })

        // New gift received
        connection.on('gift', (data) => {
            if (!isPendingStreak(data) && data.diamondCount > 0) {
                diamondsCount += (data.diamondCount * data.repeatCount);
                updateRoomStats();
            }

            if (window.settings.showGifts === "0") return;

            addGiftItem(data);
        })

        // share, follow
        connection.on('social', (data) => {
            if (window.settings.showFollows === "0") return;

            let color = data.displayType.includes('follow') ? '#ff005e' : '#2fb816';
            addChatItem(color, data, data.label.replace('{0:user}', ''));
        })

        connection.on('streamEnd', () => {
            $('#stateText').text('Stream ended.');

            // schedule next try if obs username set
            if (window.settings.username) {
                setTimeout(() => {
                    connect(window.settings.username);
                }, 30000);
            }
        })
        // var a = 0;
        // var width = screen.width;
        // var height = screen.height;

        // var minX = width / 2 - $('.bar_box').width() / 2;
        // var minY = 100;

        // var maxX = width / 2 + $('.bar_box').width() / 2;
        // var maxY = $('.bar_box').height() + 100;

        // console.log(maxX);

        // for (let index = 0; index < 10; index++) {
        //     $('.bar_box').append('   <div class="person" id="" style="top:' + ( minY +  (maxY - minY) * Math.random() ) + 'px; left: ' + ( minX +  (maxX - minX) * Math.random() ) + 'px"> <div class="name">John</div> <img class="img" src="image/output-onlinegiftools.gif" width="50"> </div>');
        // }
        // setInterval(() => {
        //     $('.person').css('top', a + 'px');
        //     a += 2;
        // }, 50);
    </script>
@endsection
