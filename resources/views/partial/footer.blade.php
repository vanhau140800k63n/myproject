<div class="footer_box">
    <div class="footer_info">
        <div class="footer_logo">
            <img style="width: 30px" src="{{ asset('image/logo2.png') }}">
            <span style="">DEVSNE.VN</span>
        </div>
        <nav>
            <h2>Về chúng tôi</h2>
            <a>Giới thiệu</a>
            <a>Liên hệ</a>
            <a>Điều khoản</a>
            <a>Việc làm</a>
        </nav>
        <nav>
            <h2>Khóa học</h2>
            <a href="{{ route('learn.lesson_intro', 'php') }}">PHP</a>
            <a href="{{ route('learn.lesson_intro', 'py') }}">Python</a>
            <a href="{{ route('learn.lesson_intro', 'js') }}">JavaScript</a>
            <a href="{{ route('learn.lesson_intro', 'java') }}">Java</a>
            <a href="{{ route('learn.lesson_intro', 'cpp') }}">C++</a>
        </nav>
        <nav>
            <h2>Framework</h2>
            <a href="{{ route('learn.lesson_intro', 'laravel') }}">Laravel</a>
            <a href="{{ route('learn.lesson_intro', 'reactjs') }}">ReactJs</a>
            <a href="{{ route('learn.lesson_intro', 'vuejs') }}">VueJs</a>
            <a href="{{ route('learn.lesson_intro', 'spring') }}">Spring</a>
            <a href="{{ route('learn.lesson_intro', 'flutter') }}">Flutter</a>
        </nav>
    </div>
    <div class="footer__copyright__text">
        <p> Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> All rights reserved | DEVSNE.VN
        </p>
    </div>
</div>
