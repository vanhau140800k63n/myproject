@if ($paginator->hasPages())
    <ul class="page">
        @if (!$paginator->onFirstPage())
            <li class="page__numbers"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i
                        class="fa-solid fa-chevron-left"></i></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page__numbers disabled"> <a class="page-link">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page__numbers active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page__numbers">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page__numbers">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                        class="fa-solid fa-chevron-right"></i></a>
            </li>
        @endif
    </ul>
@endif
<style>
    :root {
        --primary: #5b5b82;
        --greyLight: #23adade1;
        --greyLight-2: #cbe0dd;
        --greyDark: #2d4848;
    }

    ul {
        list-style-type: none;
    }

    .items-list {
        max-width: 90vw;
        margin: 2rem;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-gap: 3rem;
        justify-content: center;
        align-content: center;
    }

    @media only screen and (max-width: 600px) {
        .items-list {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .item {
        width: 10rem;
        height: 10rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--greyDark);
        cursor: pointer;
    }

    .item span {
        background: #ffffff;
        box-shadow: 0 0.8rem 2rem rgba(90, 97, 129, 0.05);
        border-radius: 0.6rem;
        padding: 2rem;
        font-size: 3rem;
        transition: all 0.3s ease;
    }

    .item:hover span {
        transform: scale(1.2);
        color: var(--primary);
    }

    .item p {
        font-size: 1.2rem;
        margin-top: 1rem;
        color: var(--greyLight);
    }

    .page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 5rem;
        padding: 0;
        flex-wrap: wrap;
    }

    .page__numbers {
        width: 2.6rem;
        height: 2.6rem;
        border-radius: 5px;
    }

    .page-link {
        font-weight: 600;
        width: inherit;
        height: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .page__numbers:hover {
        color: var(--primary);
    }

    .page__numbers.active,
    .page__numbers.active a {
        color: #ffffff;
        background: var(--primary);
        font-weight: 600;
        border-radius: 5px;
    }

    .page__btn {
        color: var(--greyLight);
        pointer-events: none;
    }

    .page__btn.active {
        color: var(--greyDark);
        pointer-events: initial;
    }

    .page__btn.active:hover {
        color: var(--primary);
    }
</style>
