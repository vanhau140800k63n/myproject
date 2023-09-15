@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title> | DEVSNE</title>
@endsection
@section('content')
    <div id="main-outlet-wrapper" class="wrap" role="main">
        <div class="sidebar-wrapper">
            <div id="d-sidebar" class="sidebar-container ember-view">
                <div class="sidebar-sections sidebar-sections-anonymous">
                    <div class="sidebar-custom-sections">
                        <div class="sidebar-section-wrapper sidebar-section" data-section-name="community">
                            <div class="sidebar-section-header-wrapper sidebar-row">
                                <button
                                    class="sidebar-section-header sidebar-section-header-collapsable btn-flat btn no-text"
                                    aria-controls="sidebar-section-content-community" aria-expanded="true"
                                    title="Toggle section" type="button">
                                    <span class="sidebar-section-header-caret">
                                        <svg class="fa d-icon d-icon-angle-down svg-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#angle-down"></use>
                                        </svg>
                                    </span>

                                    <span class="sidebar-section-header-text">
                                        Community
                                    </span>
                                </button>
                            </div>

                            <ul class="sidebar-section-content" id="sidebar-section-content-community">

                                <li class="sidebar-section-link-wrapper" data-list-item-name="everything">
                                    <a id="ember8" class="ember-view sidebar-section-link sidebar-row" title="All topics"
                                        data-link-name="everything" href="https://forum.exercism.org/latest">

                                        <span class="sidebar-section-link-prefix icon">

                                            <svg class="fa d-icon d-icon-layer-group svg-icon prefix-icon svg-string"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#layer-group"></use>
                                            </svg>
                                        </span>


                                        <span class="sidebar-section-link-content-text">
                                            Topics
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-section-link-wrapper">
                                    <button class="btn-flat sidebar-more-section-links-details-summary btn btn-icon-text"
                                        type="button">
                                        <svg class="fa d-icon d-icon-ellipsis-v svg-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#ellipsis-v"></use>
                                        </svg><span class="d-button-label">More
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-section-wrapper sidebar-section" data-section-name="categories">
                        <div class="sidebar-section-header-wrapper sidebar-row">
                            <button class="sidebar-section-header sidebar-section-header-collapsable btn-flat btn no-text"
                                aria-controls="sidebar-section-content-categories" aria-expanded="true"
                                title="Toggle section" type="button">
                                <!---->
                                <!---->

                                <span class="sidebar-section-header-caret">
                                    <svg class="fa d-icon d-icon-angle-down svg-icon svg-string"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#angle-down"></use>
                                    </svg>
                                </span>

                                <span class="sidebar-section-header-text">
                                    Categories
                                </span>
                                <!---->

                            </button>


                            <!---->
                            <!---->
                        </div>

                        <ul class="sidebar-section-content" id="sidebar-section-content-categories">


                            <li class="sidebar-section-link-wrapper" data-category-id="4">
                                <a id="ember9" class="ember-view sidebar-section-link sidebar-row"
                                    title="Chat about anything to do with Exercism. Got a feature to request? Or a plugin you’ve built? Got questions about mentoring? This is the place to chat."
                                    href="https://forum.exercism.org/c/exercism/4">

                                    <span class="sidebar-section-link-prefix span" style="color: #652D90">

                                        <span style="background: linear-gradient(90deg, #652D90 50%, #652D90 50%)"
                                            class="prefix-span"></span>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        Exercism
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-category-id="34">
                                <a id="ember10" class="ember-view sidebar-section-link sidebar-row"
                                    title="This channel is for official announcements. Anyone can reply to the announcements (posts full of celebratory emoji are welcome!!) but only staff can start new topics."
                                    href="https://forum.exercism.org/c/exercism/announcements/34">

                                    <span class="sidebar-section-link-prefix span" style="color: #0E76BD">

                                        <span style="background: linear-gradient(90deg, #652D90 50%, #0E76BD 50%)"
                                            class="prefix-span"></span>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        Announcements
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-category-id="5">
                                <a id="ember11" class="ember-view sidebar-section-link sidebar-row"
                                    title="This a space for any general programming chat. Don’t understand a concept? Found an interesting new paradigm or language? Got some general programming questions? This is the place for you!"
                                    href="https://forum.exercism.org/c/programming/5">

                                    <span class="sidebar-section-link-prefix span" style="color: #ED207B">

                                        <span style="background: linear-gradient(90deg, #ED207B 50%, #ED207B 50%)"
                                            class="prefix-span"></span>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        Programming
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-category-id="8">
                                <a id="ember12" class="ember-view sidebar-section-link sidebar-row"
                                    title="Something not working on Exercism? Can’t sign up or log in? The CLI not working for you? The online editor breaking? Tell us here and we’ll try and help fix it."
                                    href="https://forum.exercism.org/c/support/8">

                                    <span class="sidebar-section-link-prefix span" style="color: #12A89D">

                                        <span style="background: linear-gradient(90deg, #12A89D 50%, #12A89D 50%)"
                                            class="prefix-span"></span>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        Exercism Support
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-category-id="2">
                                <a id="ember13" class="ember-view sidebar-section-link sidebar-row"
                                    title="Want to chat about something not to do with Exercism or programming? Have a cat picture to share? Want to show off your new office setup? Built some cool lego? Share it all here."
                                    href="https://forum.exercism.org/c/social/2">

                                    <span class="sidebar-section-link-prefix span" style="color: #F7941D">

                                        <span style="background: linear-gradient(90deg, #F7941D 50%, #F7941D 50%)"
                                            class="prefix-span"></span>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        Social
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>


                            <li class="sidebar-section-link-wrapper" data-list-item-name="all-categories">
                                <a id="ember14" class="ember-view sidebar-section-link sidebar-row"
                                    data-link-name="all-categories" href="https://forum.exercism.org/categories">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-list svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#list"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        All categories
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>


                        </ul>
                    </div>


                    <div class="sidebar-section-wrapper sidebar-section" data-section-name="tags">
                        <div class="sidebar-section-header-wrapper sidebar-row">
                            <button class="sidebar-section-header sidebar-section-header-collapsable btn-flat btn no-text"
                                aria-controls="sidebar-section-content-tags" aria-expanded="true" title="Toggle section"
                                type="button">
                                <!---->
                                <!---->

                                <span class="sidebar-section-header-caret">
                                    <svg class="fa d-icon d-icon-angle-down svg-icon svg-string"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#angle-down"></use>
                                    </svg>
                                </span>

                                <span class="sidebar-section-header-text">
                                    Tags
                                </span>
                                <!---->

                            </button>


                            <!---->
                            <!---->
                        </div>

                        <ul class="sidebar-section-content" id="sidebar-section-content-tags">


                            <li class="sidebar-section-link-wrapper" data-tag-name="bug">
                                <a id="ember15" class="ember-view sidebar-section-link sidebar-row"
                                    href="https://forum.exercism.org/tag/bug">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-tag svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#tag"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        bug
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-tag-name="12in23">
                                <a id="ember16" class="ember-view sidebar-section-link sidebar-row"
                                    href="https://forum.exercism.org/tag/12in23">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-tag svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#tag"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        12in23
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-tag-name="python">
                                <a id="ember17" class="ember-view sidebar-section-link sidebar-row"
                                    href="https://forum.exercism.org/tag/python">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-tag svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#tag"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        python
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-tag-name="cli">
                                <a id="ember18" class="ember-view sidebar-section-link sidebar-row"
                                    href="https://forum.exercism.org/tag/cli">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-tag svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#tag"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        cli
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>

                            <li class="sidebar-section-link-wrapper" data-tag-name="advent-of-code">
                                <a id="ember19" class="ember-view sidebar-section-link sidebar-row"
                                    href="https://forum.exercism.org/tag/advent-of-code">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-tag svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#tag"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        advent-of-code
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>


                            <li class="sidebar-section-link-wrapper" data-list-item-name="all-tags">
                                <a id="ember20" class="ember-view sidebar-section-link sidebar-row"
                                    data-link-name="all-tags" href="https://forum.exercism.org/tags">

                                    <span class="sidebar-section-link-prefix icon">

                                        <svg class="fa d-icon d-icon-list svg-icon prefix-icon svg-string"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#list"></use>
                                        </svg>

                                        <!---->
                                    </span>


                                    <span class="sidebar-section-link-content-text">
                                        All tags
                                    </span>

                                    <!---->
                                    <!---->
                                    <!---->
                                </a>
                            </li>


                        </ul>
                    </div>


                </div>

                <div class="sidebar-footer-wrapper">
                    <div class="sidebar-footer-container">
                        <div class="sidebar-footer-actions">
                            <!---->

                            <!---->
                            <!---->
                            <button
                                class="btn-flat sidebar-footer-actions-button sidebar-footer-actions-keyboard-shortcuts btn no-text btn-icon"
                                title="Keyboard Shortcuts" type="button">
                                <svg class="fa d-icon d-icon-keyboard svg-icon svg-string"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#keyboard"></use>
                                </svg>​

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="main-outlet">
            <div class="container" id="main-container">
                <div id="ember21" class="ember-view">
                    <div id="exercism-banner">
                        <div class="exercism-title">Hey 👋 Welcome to the Exercism Community!</div>
                        <nav>
                            <a href="https://forum.exercism.org/faq">Community Guidelines</a>
                            <a href="https://forum.exercism.org/categories">Browse Categories</a>
                            <a href="https://exercism.org/">Back to Exercism</a>
                        </nav>
                    </div>
                </div>
                <div id="ember22" class="controls ember-view">
                    <!---->
                </div>
                <div id="ember23" class="ember-view">
                    <!---->
                </div>
                <div class="global-notice">
                    <!---->
                </div>
                <!---->
            </div>

            <div id="ember379" class="regular ember-view">
                <div id="topic-title" class="ember-view">
                    <div class="container">
                        <div class="title-wrapper">

                            <h1 data-topic-id="3291">
                                <!---->

                                <div id="ember412" class="topic-statuses ember-view">
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                </div>
                                <a href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291"
                                    class="fancy-title">
                                    Which language to choose for Functional Feb?
                                </a>

                                <!---->
                                <!---->
                            </h1>

                            <div id="ember413" class="topic-category ember-view"> <a class="badge-wrapper bullet"
                                    href="https://forum.exercism.org/c/exercism/4"><span class="badge-category-bg"
                                        style="background-color: #652D90;"></span><span data-drop-close="true"
                                        class="badge-category clear-badge"
                                        title="Chat about anything to do with Exercism. Got a feature to request? Or a plugin you’ve built? Got questions about mentoring? This is the place to chat."><span
                                            class="category-name">Exercism</span></span></a>
                                <div class="topic-header-extra">
                                    <div class="list-tags">
                                        <div class="discourse-tags" role="list" aria-label="Tags"><a
                                                href="https://forum.exercism.org/tag/12in23" data-tag-name="12in23"
                                                class="discourse-tag simple">12in23</a> </div>
                                    </div>
                                    <!---->
                                </div>

                                <span>
                                    <!---->
                                </span>
                            </div>

                        </div>
                        <span>
                            <!---->
                        </span>
                    </div>
                </div>

                <!---->

                <div class="container posts">
                    <div class="selected-posts hidden">
                        <div id="ember414" class="ember-view">
                            <p>
                                <span id="ember415" class="ember-view">You have selected <b>0</b> posts.</span>
                            </p>

                            <p>
                                <a class="select-all"
                                    href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291">
                                    select all
                                </a>
                            </p>

                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <p class="cancel">
                                <a href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291">
                                    cancel selecting
                                </a>
                            </p>
                        </div>
                    </div>

                    <!---->

                    <div id="ember416" class="topic-navigation with-timeline ember-view">
                        <div id="ember417" class="topic-navigation-outlet no-answer ember-view">
                            <!---->
                        </div>


                        <div class="timeline-container ">
                            <div class="topic-timeline">
                                <!---->
                                <!---->
                                <div class="timeline-scrollarea-wrapper">
                                    <div class="timeline-date-wrapper">
                                        <a class="start-date" title="Feb 1">
                                            <span>
                                                Feb 1
                                            </span>
                                        </a>
                                    </div>
                                    <div class="timeline-scrollarea" style="height: 300px">
                                        <div class="timeline-padding" style="height: 27.31433546686747px"></div>
                                        <div style="height: 50px" class="timeline-scroller">
                                            <div class="timeline-handle"></div>
                                            <div class="timeline-scroller-content">
                                                <div class="timeline-replies">
                                                    1 / 8
                                                </div>
                                                <div class="timeline-ago">
                                                    Feb 1
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <div class="timeline-padding" style="height: 222.68566453313252px"></div>

                                        <!---->
                                    </div>

                                    <div class="timeline-date-wrapper">
                                        <a class="now-date">
                                            <span>
                                                <span class="relative-date" title="Feb 1, 2023 11:53 pm"
                                                    data-time="1675270401269" data-format="tiny">Feb 1</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="timeline-footer-controls">
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                    <!---->
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <section class="topic-area" id="topic" data-topic-id="3291">

                            <div class="posts-wrapper">
                                <div id="ember419" class="loading-container ember-view">
                                </div>

                                <span>
                                    <!---->
                                </span>

                                <div id="ember420" class="ember-view">
                                    <!---->
                                    <div class="post-stream">
                                        <div class="topic-post clearfix topic-owner regular sticky-avatar">
                                            <article id="post_1" aria-label="post #1 by @suyash-1234" role="region"
                                                data-post-id="7384" data-topic-id="3291" data-user-id="1674"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar" style="margin-bottom: 60px;">
                                                        <div class="post-avatar"><a class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/suyash-1234"
                                                                data-user-card="suyash-1234" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/96.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/suyash-1234"
                                                                        data-user-card="suyash-1234"
                                                                        class="">suyash-1234</a></span></div>
                                                            <div class="post-infos">
                                                                <div class="post-info edits"><button
                                                                        class="widget-button btn-flat btn-icon-text"
                                                                        title="post last edited on Feb 2, 2023 2:32 am"
                                                                        aria-label="post edit history"><svg
                                                                            class="fa d-icon d-icon-pencil-alt svg-icon svg-node"
                                                                            aria-hidden="true">
                                                                            <use href="#pencil-alt"></use>
                                                                        </svg><span
                                                                            class="d-button-label">1</span></button></div>
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:35 pm"
                                                                            data-time="1675269335167" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents">
                                                            <div class="cooked">
                                                                <p>I am beginner in function programming which functional
                                                                    programming language i
                                                                    choose for functional feb</p>
                                                            </div>
                                                            <div class="cooked">
                                                                <aside class="quote accepted-answer" data-post="8"
                                                                    data-topic="3291">
                                                                    <div class="title" style="cursor: pointer;"
                                                                        data-has-quote-controls="true">
                                                                        <svg class="fa d-icon d-icon-check-square svg-icon accepted svg-string"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <use href="#check-square"></use>
                                                                        </svg> Solved <span class="by">by <a
                                                                                href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291"
                                                                                data-user-card="matthijsblom">MatthijsBlom</a></span>
                                                                        in <a
                                                                            href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/8"
                                                                            class="back">post #8</a>
                                                                        <div class="quote-controls"><button
                                                                                aria-controls="quote-id-3291-8-0"
                                                                                aria-expanded="false"
                                                                                class="quote-toggle btn-flat"><span
                                                                                    class="svg-icon-title"
                                                                                    title="expand/collapse"><svg
                                                                                        class="fa d-icon d-icon-chevron-down svg-icon svg-string"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <use href="#chevron-down"></use>
                                                                                    </svg></span></button></div>
                                                                    </div>
                                                                    <blockquote id="quote-id-3291-8-0">
                                                                        Reportedly Elixir has a great syllabus on Exercism.
                                                                        That seems like a good
                                                                        reason to try it on this platform.
                                                                    </blockquote>
                                                                </aside>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div id="discourse-reactions-actions-7384-left"
                                                                        data-click-outside="true"
                                                                        class="discourse-reactions-actions">
                                                                        <div id="discourse-reactions-counter-7384-left"
                                                                            data-click-outside="true"></div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div id="discourse-reactions-actions-7384-right"
                                                                            data-click-outside="true"
                                                                            class="discourse-reactions-actions">
                                                                            <div
                                                                                class="discourse-reactions-reaction-button">
                                                                                <button
                                                                                    class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                        class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#far-heart"></use>
                                                                                    </svg></button>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                        <div class="topic-map">
                                                            <section class="map map-collapsed">
                                                                <nav class="buttons"><button
                                                                        class="widget-button btn no-text btn-icon"
                                                                        title="expand topic details" aria-expanded="false"
                                                                        aria-controls="topic-map-expanded"><svg
                                                                            class="fa d-icon d-icon-chevron-down svg-icon svg-node"
                                                                            aria-hidden="true">
                                                                            <use href="#chevron-down"></use>
                                                                        </svg></button></nav>
                                                                <ul>
                                                                    <li class="created-at">
                                                                        <h4 role="presentation">created</h4>
                                                                        <div class="topic-map-post created-at"><a
                                                                                class="trigger-user-card "
                                                                                data-user-card="suyash-1234"
                                                                                aria-hidden="true"><img alt=""
                                                                                    width="24" height="24"
                                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/48.png"
                                                                                    title="suyash-1234"
                                                                                    aria-label="suyash-1234"
                                                                                    loading="lazy" tabindex="-1"
                                                                                    class="avatar"></a><span
                                                                                title="Feb 1, 2023 11:35 pm"
                                                                                data-time="1675269334907"
                                                                                data-format="tiny"
                                                                                class="relative-date">Feb
                                                                                1</span></div>
                                                                    </li>
                                                                    <li class="last-reply"><a
                                                                            href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/9">
                                                                            <h4 role="presentation">last reply</h4>
                                                                            <div class="topic-map-post last-reply"><a
                                                                                    class="trigger-user-card "
                                                                                    data-user-card="glennj"
                                                                                    aria-hidden="true"><img alt=""
                                                                                        width="24" height="24"
                                                                                        src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/73_2.png"
                                                                                        title="Glenn Jackman"
                                                                                        aria-label="Glenn Jackman"
                                                                                        loading="lazy" tabindex="-1"
                                                                                        class="avatar"></a><span
                                                                                    title="Feb 1, 2023 11:53 pm"
                                                                                    data-time="1675270401269"
                                                                                    data-format="tiny"
                                                                                    class="relative-date">Feb
                                                                                    1</span></div>
                                                                        </a></li>
                                                                    <li class="replies"><span class="number">7</span>
                                                                        <h4 role="presentation">replies</h4>
                                                                    </li>
                                                                    <li class="secondary views"><span
                                                                            class="number">106</span>
                                                                        <h4 role="presentation">views</h4>
                                                                    </li>
                                                                    <li class="secondary users"><span
                                                                            class="number">4</span>
                                                                        <h4 role="presentation">users</h4>
                                                                    </li>
                                                                    <li class="secondary likes"><span
                                                                            class="number">7</span>
                                                                        <h4 role="presentation">likes</h4>
                                                                    </li>
                                                                    <li class="avatars">
                                                                        <div><a class="poster trigger-user-card"
                                                                                title="Meatball" data-user-card="Meatball"
                                                                                href="https://forum.exercism.org/u/Meatball"><img
                                                                                    alt="" width="48"
                                                                                    height="48"
                                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/108_2.png"
                                                                                    title="Meatball" aria-label="Meatball"
                                                                                    loading="lazy" tabindex="-1"
                                                                                    class="avatar"><span
                                                                                    class="post-count">3</span></a></div>
                                                                        <div><a class="poster trigger-user-card"
                                                                                title="suyash-1234"
                                                                                data-user-card="suyash-1234"
                                                                                href="https://forum.exercism.org/u/suyash-1234"><img
                                                                                    alt="" width="48"
                                                                                    height="48"
                                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/96.png"
                                                                                    title="suyash-1234"
                                                                                    aria-label="suyash-1234"
                                                                                    loading="lazy" tabindex="-1"
                                                                                    class="avatar"><span
                                                                                    class="post-count">3</span></a></div>
                                                                        <div><a class="poster trigger-user-card"
                                                                                title="MatthijsBlom"
                                                                                data-user-card="MatthijsBlom"
                                                                                href="https://forum.exercism.org/u/MatthijsBlom"><img
                                                                                    alt="" width="48"
                                                                                    height="48"
                                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/68_2.png"
                                                                                    title="Matthijs Blom"
                                                                                    aria-label="Matthijs Blom"
                                                                                    loading="lazy" tabindex="-1"
                                                                                    class="avatar"></a></div>
                                                                    </li>
                                                                </ul>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix regular">
                                            <article id="post_2" aria-label="post #2 by @Meatball" role="region"
                                                data-post-id="7387" data-topic-id="3291" data-user-id="93"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/Meatball"
                                                                data-user-card="Meatball" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/108_2.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/Meatball"
                                                                        data-user-card="Meatball"
                                                                        class="">Meatball</a></span></div>
                                                            <div class="post-infos">
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/2"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:37 pm"
                                                                            data-time="1675269447587" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents">
                                                            <div class="cooked">
                                                                <p>I really liked elixir, I think to this date that it is
                                                                    the language that has the
                                                                    best official documentation (that I have programmed in).
                                                                    And if you are
                                                                    experienced with ruby so does it have a bit similar
                                                                    syntax to that language.</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div class="discourse-reactions-actions custom-reaction-used has-reactions"
                                                                        id="discourse-reactions-actions-7387-left"
                                                                        data-click-outside="true">
                                                                        <div class="discourse-reactions-counter"
                                                                            id="discourse-reactions-counter-7387-left"
                                                                            data-click-outside="true">
                                                                            <div
                                                                                class="discourse-reactions-state-panel max-length-1">
                                                                            </div>
                                                                            <div class="discourse-reactions-list">
                                                                                <div class="reactions">
                                                                                    <div id="discourse-reactions-list-emoji-7387-+1"
                                                                                        class="discourse-reactions-list-emoji">
                                                                                        <img width="20" height="20"
                                                                                            src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/+1.png"
                                                                                            alt="+1" class="emoji">
                                                                                        <div class="user-list">
                                                                                            <div class="container"><span
                                                                                                    class="heading">+1</span>
                                                                                                <div class="center">
                                                                                                    <div
                                                                                                        class="spinner small">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="discourse-reactions-list-emoji-7387-heart"
                                                                                        class="discourse-reactions-list-emoji">
                                                                                        <img width="20" height="20"
                                                                                            src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/heart.png"
                                                                                            alt="heart" class="emoji">
                                                                                        <div class="user-list">
                                                                                            <div class="container"><span
                                                                                                    class="heading">heart</span>
                                                                                                <div class="center">
                                                                                                    <div
                                                                                                        class="spinner small">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div><span class="reactions-counter">2</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div class="discourse-reactions-actions custom-reaction-used has-reactions"
                                                                            id="discourse-reactions-actions-7387-right"
                                                                            data-click-outside="true">
                                                                            <div title="You can no longer remove your like"
                                                                                class="discourse-reactions-reaction-button">
                                                                                <button
                                                                                    title="You can no longer remove your like"
                                                                                    class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                        class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#far-heart"></use>
                                                                                    </svg></button>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix topic-owner regular">
                                            <article id="post_4" aria-label="post #4 by @suyash-1234" role="region"
                                                data-post-id="7389" data-topic-id="3291" data-user-id="1674"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/suyash-1234"
                                                                data-user-card="suyash-1234" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/96.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/suyash-1234"
                                                                        data-user-card="suyash-1234"
                                                                        class="">suyash-1234</a></span></div>
                                                            <div class="post-infos">
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/4"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:39 pm"
                                                                            data-time="1675269583282" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents">
                                                            <div class="cooked">
                                                                <aside class="quote no-group" data-username="Meatball"
                                                                    data-post="2" data-topic="3291" data-full="true">
                                                                    <div class="title">
                                                                        <div class="quote-controls"><a
                                                                                href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/2"
                                                                                title="go to the quoted post"
                                                                                class="btn-flat back"><svg
                                                                                    class="fa d-icon d-icon-arrow-up svg-icon svg-string"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <use href="#arrow-up"></use>
                                                                                </svg></a></div>
                                                                        <img loading="lazy" alt="" width="20"
                                                                            height="20"
                                                                            src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/108_2(1).png"
                                                                            class="avatar" style="aspect-ratio: 20 / 20;">
                                                                        Meatball:
                                                                    </div>
                                                                    <blockquote id="quote-id-3291-2-0">
                                                                        <p>I really liked elixir, I think to this date that
                                                                            it is the language that has
                                                                            the best official documentation (that I have
                                                                            programmed in). And if you are
                                                                            experienced with ruby so does it have a bit
                                                                            similar syntax to that language.
                                                                        </p>
                                                                    </blockquote>
                                                                </aside>
                                                                <p><a
                                                                        href="https://forum.exercism.org/t/language-for-functional-feb/3291/3"><br>
                                                                        1m</a></p>
                                                                <p>thanks but i have zero experiences in ruby<br>
                                                                    can i still go with elixir</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div id="discourse-reactions-actions-7389-left"
                                                                        data-click-outside="true"
                                                                        class="discourse-reactions-actions">
                                                                        <div id="discourse-reactions-counter-7389-left"
                                                                            data-click-outside="true"></div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div id="discourse-reactions-actions-7389-right"
                                                                            data-click-outside="true"
                                                                            class="discourse-reactions-actions">
                                                                            <div
                                                                                class="discourse-reactions-reaction-button">
                                                                                <button
                                                                                    class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                        class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#far-heart"></use>
                                                                                    </svg></button>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix regular sticky-avatar">
                                            <article id="post_5" aria-label="post #5 by @Meatball" role="region"
                                                data-post-id="7390" data-topic-id="3291" data-user-id="93"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/Meatball"
                                                                data-user-card="Meatball" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/108_2.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/Meatball"
                                                                        data-user-card="Meatball"
                                                                        class="">Meatball</a></span></div>
                                                            <div class="post-infos"><a tabindex="0"
                                                                    aria-controls="embedded-posts__top--5"
                                                                    aria-expanded="false" title="Load parent post"
                                                                    class="reply-to-tab"><svg
                                                                        class="fa d-icon d-icon-share svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#share"></use>
                                                                    </svg> <img alt="" width="24"
                                                                        height="24"
                                                                        src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/48.png"
                                                                        title="suyash-1234" aria-label="suyash-1234"
                                                                        loading="lazy" tabindex="-1" class="avatar">
                                                                    <span>suyash-1234</span></a>
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/5"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:42 pm"
                                                                            data-time="1675269778115" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents avoid-tab">
                                                            <div class="cooked">
                                                                <p>You can, it is just syntax (how you write). I would say
                                                                    under the hood are the
                                                                    languages very different.</p>
                                                                <p>When I said similar syntax I meant that both languages
                                                                    uses <code>end</code>
                                                                    statements and uses <code>def</code> to declare
                                                                    functions.</p>
                                                                <p>But outside of that knowing ruby doesn’t help. So you
                                                                    absolutely don’t need ruby
                                                                    experience to learn elixir. It is just that some people
                                                                    may prefer to use
                                                                    <code>end</code> statements and is used to that kind of
                                                                    “typing”.
                                                                </p>
                                                                <p>But there are a lot more languages than just ruby and
                                                                    elixir which uses end
                                                                    statments.</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div id="discourse-reactions-actions-7390-left"
                                                                        data-click-outside="true"
                                                                        class="discourse-reactions-actions">
                                                                        <div id="discourse-reactions-counter-7390-left"
                                                                            data-click-outside="true"></div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div id="discourse-reactions-actions-7390-right"
                                                                            data-click-outside="true"
                                                                            class="discourse-reactions-actions">
                                                                            <div
                                                                                class="discourse-reactions-reaction-button">
                                                                                <button
                                                                                    class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                        class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#far-heart"></use>
                                                                                    </svg></button>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix topic-owner regular">
                                            <article id="post_6" aria-label="post #6 by @suyash-1234" role="region"
                                                data-post-id="7391" data-topic-id="3291" data-user-id="1674"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/suyash-1234"
                                                                data-user-card="suyash-1234" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/96.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/suyash-1234"
                                                                        data-user-card="suyash-1234"
                                                                        class="">suyash-1234</a></span></div>
                                                            <div class="post-infos">
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/6"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:44 pm"
                                                                            data-time="1675269860609" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents">
                                                            <div class="cooked">
                                                                <p>actually the i only use C like syntax language</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded"><button
                                                                        class="widget-button btn-flat show-replies btn-icon-text"
                                                                        aria-label="This post has 2 replies"
                                                                        aria-expanded="false"
                                                                        aria-controls="embedded-posts__bottom--6"
                                                                        aria-pressed="false"><span
                                                                            class="d-button-label">2 Replies</span><svg
                                                                            class="fa d-icon d-icon-chevron-down svg-icon svg-node"
                                                                            aria-hidden="true">
                                                                            <use href="#chevron-down"></use>
                                                                        </svg></button>
                                                                    <div id="discourse-reactions-actions-7391-left"
                                                                        data-click-outside="true"
                                                                        class="discourse-reactions-actions">
                                                                        <div id="discourse-reactions-counter-7391-left"
                                                                            data-click-outside="true"></div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div id="discourse-reactions-actions-7391-right"
                                                                            data-click-outside="true"
                                                                            class="discourse-reactions-actions">
                                                                            <div
                                                                                class="discourse-reactions-reaction-button">
                                                                                <button
                                                                                    class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                        class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#far-heart"></use>
                                                                                    </svg></button>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix regular">
                                            <article id="post_7" aria-label="post #7 by @Meatball" role="region"
                                                data-post-id="7397" data-topic-id="3291" data-user-id="93"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/Meatball"
                                                                data-user-card="Meatball" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/108_2.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/Meatball"
                                                                        data-user-card="Meatball"
                                                                        class="">Meatball</a></span></div>
                                                            <div class="post-infos">
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/7"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:50 pm"
                                                                            data-time="1675270207785" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents">
                                                            <div class="cooked">
                                                                <p>I am not that used to c style programming and not to that
                                                                    many functional
                                                                    languages. I know scala uses <code>{}</code> but I think
                                                                    exploring the language
                                                                    which you find intresting and perhaps not focus too much
                                                                    that it has syntax that
                                                                    you feel familiar with since I think most functional
                                                                    languages uses a bit
                                                                    different syntax then C.</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div id="discourse-reactions-actions-7397-left"
                                                                        data-click-outside="true"
                                                                        class="discourse-reactions-actions">
                                                                        <div id="discourse-reactions-counter-7397-left"
                                                                            data-click-outside="true"></div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div id="discourse-reactions-actions-7397-right"
                                                                            data-click-outside="true"
                                                                            class="discourse-reactions-actions">
                                                                            <div
                                                                                class="discourse-reactions-reaction-button">
                                                                                <button
                                                                                    class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                        class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#far-heart"></use>
                                                                                    </svg></button>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix regular">
                                            <article id="post_8" aria-label="post #8 by @MatthijsBlom"
                                                role="region" data-post-id="7404" data-topic-id="3291"
                                                data-user-id="68" class="boxed onscreen-post"><span aria-hidden="true"
                                                    tabindex="-1" class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a
                                                                class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/MatthijsBlom"
                                                                data-user-card="MatthijsBlom" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/68_2.png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/MatthijsBlom"
                                                                        data-user-card="MatthijsBlom"
                                                                        class="">MatthijsBlom</a></span></div>
                                                            <div class="post-infos">
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/8"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:51 pm"
                                                                            data-time="1675270313131" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents">
                                                            <div class="cooked">
                                                                <p>Reportedly Elixir has a great syllabus on Exercism. That
                                                                    seems like a good reason
                                                                    to try it on this platform.</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div class="actions">
                                                                        <div class="discourse-reactions-actions has-reactions"
                                                                            id="discourse-reactions-actions-7404-right"
                                                                            data-click-outside="true">
                                                                            <div
                                                                                class="discourse-reactions-double-button">
                                                                                <div class="only-like discourse-reactions-counter"
                                                                                    id="discourse-reactions-counter-7404-right"
                                                                                    data-click-outside="true">
                                                                                    <div
                                                                                        class="discourse-reactions-state-panel max-length-1">
                                                                                    </div><span
                                                                                        class="reactions-counter">2</span>
                                                                                </div>
                                                                                <div title="You can no longer remove your like"
                                                                                    class="discourse-reactions-reaction-button">
                                                                                    <button
                                                                                        title="You can no longer remove your like"
                                                                                        class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                            class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                            aria-hidden="true">
                                                                                            <use href="#far-heart"></use>
                                                                                        </svg></button>
                                                                                </div>
                                                                            </div>
                                                                        </div><span class="extra-buttons"><span
                                                                                title="This is the accepted solution to this topic"
                                                                                class="accepted-text"><span><svg
                                                                                        class="fa d-icon d-icon-check svg-icon svg-node"
                                                                                        aria-hidden="true">
                                                                                        <use href="#check"></use>
                                                                                    </svg></span><span
                                                                                    class="accepted-label">Solution</span></span><button
                                                                                class="widget-button btn-flat hidden no-text"
                                                                                disabled="true"></button></span><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="topic-post clearfix regular">
                                            <article id="post_9" aria-label="post #9 by @glennj" role="region"
                                                data-post-id="7407" data-topic-id="3291" data-user-id="72"
                                                class="boxed onscreen-post"><span aria-hidden="true" tabindex="-1"
                                                    class="tabLoc"></span>
                                                <div class="row">
                                                    <div class="topic-avatar">
                                                        <div class="post-avatar"><a
                                                                class="trigger-user-card main-avatar "
                                                                href="https://forum.exercism.org/u/glennj"
                                                                data-user-card="glennj" aria-hidden="true"
                                                                tabindex="-1"><img alt="" width="48"
                                                                    height="48"
                                                                    src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/73_2(1).png"
                                                                    loading="lazy" tabindex="-1" class="avatar"></a>
                                                        </div>
                                                    </div>
                                                    <div class="topic-body clearfix">
                                                        <div role="heading" aria-level="2" class="topic-meta-data">
                                                            <div class="names trigger-user-card"><span
                                                                    class="first username"><a
                                                                        href="https://forum.exercism.org/u/glennj"
                                                                        data-user-card="glennj"
                                                                        class="">glennj</a></span></div>
                                                            <div class="post-infos"><a tabindex="0"
                                                                    aria-controls="embedded-posts__top--9"
                                                                    aria-expanded="false" title="Load parent post"
                                                                    class="reply-to-tab"><svg
                                                                        class="fa d-icon d-icon-share svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#share"></use>
                                                                    </svg> <img alt="" width="24"
                                                                        height="24"
                                                                        src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/48.png"
                                                                        title="suyash-1234" aria-label="suyash-1234"
                                                                        loading="lazy" tabindex="-1" class="avatar">
                                                                    <span>suyash-1234</span></a>
                                                                <div class="post-info post-date"><a
                                                                        class="widget-link post-date"
                                                                        href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291/9"
                                                                        title="Post date"><span
                                                                            title="Feb 1, 2023 11:53 pm"
                                                                            data-time="1675270401269" data-format="tiny"
                                                                            class="relative-date">Feb 1</span></a></div>
                                                                <div class="read-state read" title="Post is unread"><svg
                                                                        class="fa d-icon d-icon-circle svg-icon svg-node"
                                                                        aria-hidden="true">
                                                                        <use href="#circle"></use>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div class="regular contents avoid-tab">
                                                            <div class="cooked">
                                                                <p>This is really the point of <a class="hashtag"
                                                                        href="https://forum.exercism.org/tag/12in23">#<span>12in23</span></a>
                                                                    – give
                                                                    yourself the opportunity to go beyond your comfort zone
                                                                    and try languages with
                                                                    quite different syntax and/or paradigms. The more you
                                                                    know, the faster it is to
                                                                    pick up new languages!</p>
                                                                <p>I’m a veteran programmer, but I had a real mental block
                                                                    for functional languages
                                                                    until I worked through the elixir track. The learning
                                                                    syllabus does an excellent
                                                                    job guiding you.</p>
                                                            </div>
                                                            <section class="post-menu-area clearfix">
                                                                <nav class="post-controls expanded">
                                                                    <div class="actions">
                                                                        <div class="discourse-reactions-actions has-reactions"
                                                                            id="discourse-reactions-actions-7407-right"
                                                                            data-click-outside="true">
                                                                            <div
                                                                                class="discourse-reactions-double-button">
                                                                                <div class="only-like discourse-reactions-counter"
                                                                                    id="discourse-reactions-counter-7407-right"
                                                                                    data-click-outside="true">
                                                                                    <div
                                                                                        class="discourse-reactions-state-panel max-length-1">
                                                                                    </div><span
                                                                                        class="reactions-counter">4</span>
                                                                                </div>
                                                                                <div title="You can no longer remove your like"
                                                                                    class="discourse-reactions-reaction-button">
                                                                                    <button
                                                                                        title="You can no longer remove your like"
                                                                                        class="btn-toggle-reaction-like btn-icon no-text reaction-button"><svg
                                                                                            class="fa d-icon d-icon-far-heart svg-icon svg-node"
                                                                                            aria-hidden="true">
                                                                                            <use href="#far-heart"></use>
                                                                                        </svg></button>
                                                                                </div>
                                                                            </div>
                                                                        </div><button
                                                                            class="widget-button btn-flat share no-text btn-icon"
                                                                            title="share a link to this post"><svg
                                                                                class="fa d-icon d-icon-d-post-share svg-icon svg-node"
                                                                                aria-hidden="true">
                                                                                <use href="#link"></use>
                                                                            </svg></button>
                                                                    </div>
                                                                </nav>
                                                            </section>
                                                        </div>
                                                        <section class="post-actions">
                                                        </section>
                                                        <div class="post-links-container"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>

                                <div id="ember421" class="loading-container ember-view">
                                </div>
                            </div>
                            <div id="topic-bottom"></div>

                            <div id="ember422" class="loading-container ember-view">

                                <!---->
                                <!---->
                                <!---->

                                <div id="ember424" class="topic-timer-info ember-view">
                                    <!---->
                                </div>

                                <!---->

                            </div>

                        </section>
                    </div>

                </div>
                <div id="ember425" class="ember-view">
                    <div class="signup-cta alert alert-info">
                        <h3>Hello! Looks like you’re enjoying the discussion, but you haven’t signed up for an account yet.
                        </h3>
                        <p>Tired of scrolling through the same posts? When you create an account you’ll always come back to
                            where you left off. With an account you can also be notified of new replies, save bookmarks, and
                            use
                            likes to thank others. We can all work together to make this community great. <img
                                width="20" height="20"
                                src="./Which language to choose for Functional Feb_ - Exercism - Exercism_files/heart.png"
                                title="heart" alt="heart" class="emoji"></p>

                        <div class="buttons">
                            <button class="btn-primary btn btn-icon-text" type="button">
                                <svg class="fa d-icon d-icon-user svg-icon svg-string"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#user"></use>
                                </svg><span class="d-button-label">Sign Up
                                    <!---->
                                </span>
                            </button>
                            <button class="no-icon btn btn-text" type="button">
                                <!----><span class="d-button-label">Maybe later
                                    <!---->
                                </span>
                            </button>
                            <a href="https://forum.exercism.org/t/which-language-to-choose-for-functional-feb/3291">no
                                thanks</a>
                        </div>
                    </div>
                </div>

                <span>
                    <!---->
                </span>
                <div class="suggested-topics-wrapper">
                    <!---->
                    <div id="suggested-topics" class="suggested-topics" role="complementary"
                        aria-labelledby="suggested-topics-title">
                        <span></span>

                        <h3 id="suggested-topics-title" class="suggested-topics-title">
                            Suggested Topics
                        </h3>

                        <div class="topics">
                            <div id="ember427" class="ember-view">
                                <div id="ember428" class="loading-container ember-view">
                                    <table id="ember429" class="topic-list ember-view">
                                        <thead class="topic-list-header">
                                            <tr>
                                                <th data-sort-order="default" class="default topic-list-data"
                                                    scope="col"><span>Topic</span>
                                                </th>


                                                <th data-sort-order="posts" class="posts num topic-list-data"
                                                    scope="col" aria-label="Sort by replies"><span>Replies</span>
                                                </th>

                                                <th data-sort-order="views" class="views num topic-list-data"
                                                    scope="col" aria-label="Sort by views"><span>Views</span></th>

                                                <th data-sort-order="activity" class="activity num topic-list-data"
                                                    scope="col" aria-label="Sort by activity"><span>Activity</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <!---->

                                        <tbody class="topic-list-body">
                                            <tr data-topic-id="3019" id="ember430"
                                                class="topic-list-item category-exercism ember-view">


                                                <td class="main-link clearfix topic-list-data" colspan="1">
                                                    <span class="link-top-line"><a
                                                            href="https://forum.exercism.org/t/are-the-exercises-a-fixed-collection/3019"
                                                            role="heading" aria-level="2"
                                                            class="title raw-link raw-topic-link"
                                                            data-topic-id="3019">Are the exercises a fixed
                                                            collection?</a><span class="topic-post-badges"></span>
                                                    </span>
                                                    <div class="link-bottom-line">

                                                        <a class="badge-wrapper bullet"
                                                            href="https://forum.exercism.org/c/exercism/4"><span
                                                                class="badge-category-bg"
                                                                style="background-color: #652D90;"></span><span
                                                                data-drop-close="true"
                                                                class="badge-category clear-badge"
                                                                title="Chat about anything to do with Exercism. Got a feature to request? Or a plugin you’ve built? Got questions about mentoring? This is the place to chat."><span
                                                                    class="category-name">Exercism</span></span></a>


                                                    </div>

                                                </td>


                                                <td class="num posts-map posts  topic-list-data"
                                                    title="This topic has 3 replies">
                                                    <button class="btn-link posts-map badge-posts "
                                                        aria-label="This topic has 3 replies">

                                                        <span class="number">3</span>
                                                    </button>
                                                </td>




                                                <td class="num views  topic-list-data">

                                                    <span class="number"
                                                        title="this topic has been viewed 84 times">84</span>
                                                </td>

                                                <td class="num topic-list-data age activity"
                                                    title="First post: Jan 26, 2023 10:26 am Posted: Jan 27, 2023 8:14 pm">
                                                    <a class="post-activity"
                                                        href="https://forum.exercism.org/t/are-the-exercises-a-fixed-collection/3019/4"><span
                                                            class="relative-date" data-time="1674825248219"
                                                            data-format="tiny">Jan 27</span></a>
                                                </td>

                                            </tr>
                                            <!---->
                                            <!---->
                                            <tr data-topic-id="3025" id="ember431"
                                                class="topic-list-item category-exercism ember-view">


                                                <td class="main-link clearfix topic-list-data" colspan="1">
                                                    <span class="link-top-line"><a
                                                            href="https://forum.exercism.org/t/the-official-list-of-exercism-badges/3025"
                                                            role="heading" aria-level="2"
                                                            class="title raw-link raw-topic-link"
                                                            data-topic-id="3025">The official list of Exercism
                                                            badges</a><span class="topic-post-badges"></span>
                                                    </span>
                                                    <div class="link-bottom-line">

                                                        <a class="badge-wrapper bullet"
                                                            href="https://forum.exercism.org/c/exercism/4"><span
                                                                class="badge-category-bg"
                                                                style="background-color: #652D90;"></span><span
                                                                data-drop-close="true"
                                                                class="badge-category clear-badge"
                                                                title="Chat about anything to do with Exercism. Got a feature to request? Or a plugin you’ve built? Got questions about mentoring? This is the place to chat."><span
                                                                    class="category-name">Exercism</span></span></a>


                                                    </div>

                                                </td>


                                                <td class="num posts-map posts  topic-list-data"
                                                    title="This topic has 1 reply">
                                                    <button class="btn-link posts-map badge-posts "
                                                        aria-label="This topic has 1 reply">

                                                        <span class="number">1</span>
                                                    </button>
                                                </td>




                                                <td class="num views  topic-list-data">

                                                    <span class="number"
                                                        title="this topic has been viewed 333 times">333</span>
                                                </td>

                                                <td class="num topic-list-data age activity"
                                                    title="First post: Jan 26, 2023 6:28 pm Posted: Jan 27, 2023 4:31 am ">
                                                    <a class="post-activity"
                                                        href="https://forum.exercism.org/t/the-official-list-of-exercism-badges/3025/2"><span
                                                            class="relative-date" data-time="1674768686941"
                                                            data-format="tiny">Jan 27</span></a>
                                                </td>

                                            </tr>
                                            <!---->
                                            <!---->
                                            <tr data-topic-id="2756" id="ember432"
                                                class="topic-list-item category-programming-javascript ember-view">


                                                <td class="main-link clearfix topic-list-data" colspan="1">
                                                    <span class="link-top-line"><a
                                                            href="https://forum.exercism.org/t/wonderful-article-and-exercise-on-nulls-and-undefined-amusement-park/2756"
                                                            role="heading" aria-level="2"
                                                            class="title raw-link raw-topic-link"
                                                            data-topic-id="2756">Wonderful article and exercise on nulls
                                                            and undefined - amusement
                                                            park</a><span class="topic-post-badges"></span>
                                                    </span>
                                                    <div class="link-bottom-line">

                                                        <a class="badge-wrapper bullet"
                                                            href="https://forum.exercism.org/c/programming/javascript/7"><span
                                                                class="badge-category-parent-bg"
                                                                style="background-color: #ED207B;"></span><span
                                                                class="badge-category-bg"
                                                                style="background-color: #0088CC;"></span><span
                                                                data-drop-close="true"
                                                                class="badge-category clear-badge"
                                                                title="Welcome to the JavaScript category. This is a space to ask any JavaScript questions, discuss exercises from the Exercism JavaScript track, or explore any other JavaScript-related conversations!"><span
                                                                    class="category-name">JavaScript</span></span></a>


                                                    </div>

                                                </td>


                                                <td class="num posts-map posts  topic-list-data"
                                                    title="This topic has 1 reply">
                                                    <button class="btn-link posts-map badge-posts "
                                                        aria-label="This topic has 1 reply">

                                                        <span class="number">1</span>
                                                    </button>
                                                </td>




                                                <td class="num views  topic-list-data">

                                                    <span class="number"
                                                        title="this topic has been viewed 69 times">69</span>
                                                </td>

                                                <td class="num topic-list-data age activity"
                                                    title="First post: Jan 17, 2023 10:21 am Posted: Jan 17, 2023 7:10 pm">
                                                    <a class="post-activity"
                                                        href="https://forum.exercism.org/t/wonderful-article-and-exercise-on-nulls-and-undefined-amusement-park/2756/2"><span
                                                            class="relative-date" data-time="1673957406442"
                                                            data-format="tiny">Jan 17</span></a>
                                                </td>

                                            </tr>
                                            <!---->
                                            <!---->
                                            <tr data-topic-id="2826" id="ember433"
                                                class="topic-list-item category-exercism-announcements ember-view">


                                                <td class="main-link clearfix topic-list-data" colspan="1">
                                                    <span class="link-top-line"><a
                                                            href="https://forum.exercism.org/t/forum-posts-on-the-website/2826"
                                                            role="heading" aria-level="2"
                                                            class="title raw-link raw-topic-link"
                                                            data-topic-id="2826">Forum posts
                                                            on the website</a><span class="topic-post-badges"></span>
                                                    </span>
                                                    <div class="link-bottom-line">

                                                        <a class="badge-wrapper bullet"
                                                            href="https://forum.exercism.org/c/exercism/announcements/34"><span
                                                                class="badge-category-parent-bg"
                                                                style="background-color: #652D90;"></span><span
                                                                class="badge-category-bg"
                                                                style="background-color: #0E76BD;"></span><span
                                                                data-drop-close="true"
                                                                class="badge-category clear-badge"
                                                                title="This channel is for official announcements. Anyone can reply to the announcements (posts full of celebratory emoji are welcome!!) but only staff can start new topics."><span
                                                                    class="category-name">Announcements</span></span></a>


                                                    </div>

                                                </td>


                                                <td class="num posts-map posts  topic-list-data"
                                                    title="This topic has 1 reply">
                                                    <button class="btn-link posts-map badge-posts "
                                                        aria-label="This topic has 1 reply">

                                                        <span class="number">1</span>
                                                    </button>
                                                </td>




                                                <td class="num views  topic-list-data">

                                                    <span class="number"
                                                        title="this topic has been viewed 64 times">64</span>
                                                </td>

                                                <td class="num topic-list-data age activity"
                                                    title="First post: Jan 19, 2023 6:22 pmPosted: Jan 20, 2023 5:47 pm">
                                                    <a class="post-activity"
                                                        href="https://forum.exercism.org/t/forum-posts-on-the-website/2826/2"><span
                                                            class="relative-date" data-time="1674211679336"
                                                            data-format="tiny">Jan 20</span></a>
                                                </td>

                                            </tr>
                                            <!---->
                                            <!---->
                                            <tr data-topic-id="3310" id="ember434"
                                                class="topic-list-item category-support tag-bug tag-12in23 status-solved ember-view">


                                                <td class="main-link clearfix topic-list-data" colspan="1">
                                                    <span class="link-top-line">
                                                        <div class="topic-statuses">
                                                            <span title="This topic has a solution"
                                                                class="topic-status"><svg
                                                                    class="fa d-icon d-icon-far-check-square svg-icon solved svg-string"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <use href="#far-check-square"></use>
                                                                </svg></span>
                                                        </div>
                                                        <a href="https://forum.exercism.org/t/i-just-earned-the-func-feb-badge-but-i-shouldnt-have/3310"
                                                            role="heading" aria-level="2"
                                                            class="title raw-link raw-topic-link" data-topic-id="3310">I
                                                            just earned the Func(Feb) badge, but I shouldn’t have</a><span
                                                            class="topic-post-badges"></span>
                                                    </span>
                                                    <div class="link-bottom-line">

                                                        <a class="badge-wrapper bullet"
                                                            href="https://forum.exercism.org/c/support/8"><span
                                                                class="badge-category-bg"
                                                                style="background-color: #12A89D;"></span><span
                                                                data-drop-close="true"
                                                                class="badge-category clear-badge"
                                                                title="Something not working on Exercism? Can’t sign up or log in? The CLI not working for you? The online editor breaking? Tell us here and we’ll try and help fix it."><span
                                                                    class="category-name">Exercism
                                                                    Support</span></span></a>
                                                        <div class="discourse-tags" role="list" aria-label="Tags">
                                                            <a href="https://forum.exercism.org/tag/bug"
                                                                data-tag-name="bug" class="discourse-tag simple">bug</a>
                                                            <a href="https://forum.exercism.org/tag/12in23"
                                                                data-tag-name="12in23"
                                                                class="discourse-tag simple">12in23</a>
                                                        </div>

                                                    </div>

                                                </td>


                                                <td class="num posts-map posts  topic-list-data"
                                                    title="This topic has 3 replies">
                                                    <button class="btn-link posts-map badge-posts "
                                                        aria-label="This topic has 3 replies">

                                                        <span class="number">3</span>
                                                    </button>
                                                </td>




                                                <td class="num views  topic-list-data">

                                                    <span class="number"
                                                        title="this topic has been viewed 116 times">116</span>
                                                </td>

                                                <td class="num topic-list-data age activity"
                                                    title="First post: Feb 2, 2023 4:09 amPosted: Feb 2, 2023 5:43 am">
                                                    <a class="post-activity"
                                                        href="https://forum.exercism.org/t/i-just-earned-the-func-feb-badge-but-i-shouldnt-have/3310/4"><span
                                                            class="relative-date" data-time="1675291432875"
                                                            data-format="tiny">Feb 2</span></a>
                                                </td>

                                            </tr>
                                            <!---->
                                            <!---->
                                        </tbody>

                                        <!---->
                                    </table>

                                </div>
                            </div>
                        </div>

                        <h3 class="suggested-topics-message">
                            Want to read more? Browse other topics in <a class="badge-wrapper bullet"
                                href="https://forum.exercism.org/c/exercism/4"><span class="badge-category-bg"
                                    style="background-color: #652D90;"></span><span data-drop-close="true"
                                    class="badge-category clear-badge"
                                    title="Chat about anything to do with Exercism. Got a feature to request? Or a plugin you’ve built? Got questions about mentoring? This is the place to chat."><span
                                        class="category-name">Exercism</span></span></a> or <a
                                href="https://forum.exercism.org/latest">view latest topics</a>.
                        </h3>
                    </div>

                    <span>
                        <!---->
                    </span>
                </div>

                <div id="ember384" class="quote-button ember-view">
                    <div class="buttons">
                        <!---->
                        <!---->
                        <span class="quote-sharing">
                            <button class="btn-flat quote-share-label btn btn-icon-text" type="button">
                                <svg class="fa d-icon d-icon-share svg-icon svg-string"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#share"></use>
                                </svg><span class="d-button-label">Share
                                    <!---->
                                </span>
                            </button>

                            <span class="quote-share-buttons">
                                <button class="btn-flat btn no-text btn-icon" title="Share on Twitter" type="button">
                                    <svg class="fa d-icon d-icon-fab-twitter svg-icon svg-string"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#fab-twitter"></use>
                                    </svg>​

                                </button>
                                <button class="btn-flat btn no-text btn-icon" title="Send via email" type="button">
                                    <svg class="fa d-icon d-icon-envelope svg-icon svg-string"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#envelope"></use>
                                    </svg>​

                                </button>
                                <!---->
                            </span>
                        </span>
                    </div>

                    <div class="extra">
                        <!---->
                        <!---->
                    </div>
                </div>
            </div>

            <!---->
            <div id="user-card" class="user-card no-bg group-undefined ember-view" role="dialog"
                aria-labelledby="discourse-user-card-title" style="left: -9999px; top: -9999px;">
                <!---->
            </div>

            <div id="group-card" class="no-bg group-card ember-view" style="left: -9999px; top: -9999px;">
                <!---->
            </div>
        </div>
    </div>
@endsection
