@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title> Weekly Challenge | DEVSNE</title>
@endsection
@section('content')
    <main class="challenge_info_box">
        <div class="challenge_info_banner">
            <div class="c_i_b_countdown">
                <h3>Weekly Challenge</h3>
                <div id="timer">
                    <div id="hours"></div>
                </div>
            </div>
            <div class="c_i_b_reward">
                <img width="40px" src="https://devsne.vn/image/challenge/cup.png">
                <p>Giải nhất</p><a target="_blank" style="font-weight: 700; color: #f6b866;"
                    href="https://cellphones.com.vn/ban-phim-co-rapoo-v500-pro-blue-switch.html">Bàn Phím Cơ</a>
            </div>
            <div class="c_i_b_clock">
                <img width="40px" src="https://devsne.vn/image/challenge/clock.png">
                <p>Thời gian: {{ $challenge->time }} phút</p>
            </div>
            <div class="c_i_b_skill">
                <img width="40px" src="https://devsne.vn/image/challenge/skill.png">
                <p>Giải thuật</p>
            </div>
            <a href="{{ route('exam.challenge.week') }}" class="c_i_b_btn">Vào Thi</a>
        </div>
        <div class="challenge_info_ranking">
            <div class="leaderboard">
                <div class="ribbon"></div>
                <table>
                    @foreach ($top_answer as $answer)
                        @if ($answer->index == 1)
                            <tr>
                                <td class="number">{{ $answer->index }}</td>
                                <td class="name">{{ $answer->user_name }}</td>
                                <td class="points">
                                    {{ $answer->score }} <img class="gold-medal"
                                        src="https://github.com/malunaridev/Challenges-iCodeThis/blob/master/4-leaderboard/assets/gold-medal.png?raw=true"
                                        alt="gold medal" />
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="number">{{ $answer->index }}</td>
                                <td class="name">{{ $answer->user_name }}</td>
                                <td class="points">{{ $answer->score }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            <img class="c_i_g_img" src="https://devsne.vn/image/challenge/ranking.png">
        </div>

        <div class="challenge_info_general">
            <img class="c_i_g_img" src="https://devsne.vn/image/challenge/info.jpg">
            <div class="c_i_g_box">
                <h2>Thông tin chung</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>
                                Thời gian:</th>
                            <td style="padding:16px;">{{ $challenge->time }} phút</td>
                        </tr>
                        <tr>
                            <th>
                                Số thử thách:</th>
                            <td style="padding:16px;">1</td>
                        </tr>
                        <tr>
                            <th>
                                Ngôn ngữ:</th>
                            <td style="padding:16px;">C, C#, C++, Java, Javascript, Python</td>
                        </tr>
                        <tr>
                            <th>
                                Yêu cầu:</th>
                            <td style="padding:16px;">Kỹ năng lập trình, Thuật toán</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="challenge_info_contest">
            <ol style="--length: 5" role="list">
                <li style="--i: 1">
                    <h3>Hình thức thi</h3>
                    <p>Sử dụng ngôn ngữ lập trình đã chọn, mỗi người chơi sẽ viết một chương trình để giải bài toán do Ban
                        tổ chức đưa ra</p>
                </li>
                <li style="--i: 2">
                    <h3>Hình thức chấm điểm</h3>
                    <p>Các chương trình của người chơi sau đó sẽ được gửi đến hệ thống để kiểm tra. Chương trình sẽ được
                        chấp nhận nếu vượt qua tất cả các trường hợp thử nghiệm.</p>
                </li>
            </ol>
            <img class="c_i_c_img" src="https://devsne.vn/image/challenge/rule.png">
        </div>
    </main>
    @if ($message != null)
        <div class="contest_modal_bg">
            <div class="contest_modal">
                <div class="cm_title"> {!! $message !!} </div>
                <div class="cm_action">
                    <button class="cm_action_cancel">Quay Lại</button>
                </div>
            </div>
        </div>
    @endif
    <script>
        $('.contest_modal_bg').css('display', 'flex');
        $('.cm_action_cancel').click(function() {
            $('.contest_modal_bg').hide();
        })

        function countDown() {
            var currDate = new Date()
            var endTime = new Date({{ date('Y', $time_start) }}, {{ date('m', $time_start) - 1 }},
                {{ date('d', $time_start) }}, {{ date('H', $time_start) }}, {{ date('i', $time_start) }},
                {{ date('s', $time_start) }});
            endTime = (Date.parse(endTime) / 1000);
            var now = new Date();
            now = (Date.parse(now) / 1000);
            var timeLeft = endTime - now;

            if (timeLeft <= 0) {
                $("#hours").html('Bắt Đầu Thi');
                return true;
            }

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            $("#hours").html(days + "Ngày " + hours + ":" + minutes + ":" + seconds);
        }

        setInterval(function() {
            countDown();
        }, 1000);
    </script>
@endsection