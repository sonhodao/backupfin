
        <div class="pagination-wrapper">
            @if ($posts->lastPage() > 1)
                <p class="counter"> Page 1 of 2 </p>
                <ul class="pagination">

                    <li class="prev @if (!$posts->previousPageUrl()) disabled @endif">
                        <a class="page-link" href="{{ $posts->previousPageUrl() }}"
                            aria-label="Previous" tabindex="-1" aria-disabled="true" title="«">«
                        </a>
                    </li>
        
                    @if ($posts->lastPage() > 1)
                        @for ($i = 1; $i <= $posts->lastPage(); $i++)
                            <li class="page-item @if ($posts->currentPage() == $i) active @endif ">
                                <a class="page-link"
                                    href="{{ $posts->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                    @endif
        
                    <li class="next @if (!$posts->nextPageUrl()) disabled @endif">
                        <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next" title="»">»
                        </a>
                    </li>
                </ul>
            @endif
        </div>
