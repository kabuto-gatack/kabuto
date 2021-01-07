@if ($paginator->hasPages())
    <div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-3">
        {{-- Previous Page Link --}}
        {{--判断当前页是否为首页--}}
        @if ($paginator->onFirstPage())
            {{--如果当前页为首页（也就是第一页）就将上一页按钮禁止--}}
            {{--<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>--}}{{--原模板--}}
            <a href="javascript:;" class="layui-laypage-prev layui-disabled">上一页</a>
        @else
            {{--否则为可以点击状态--}}
            {{--<li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>--}}
            <a href="{{ $paginator->previousPageUrl() }}" class="layui-laypage-prev">上一页</a>
        @endif

        {{-- Pagination Elements --}}
        {{--列表页面（没有数据则不会显示）--}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            {{--页码显示--}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    {{--如果该页为当前页，则不可点击--}}
                    @if ($page == $paginator->currentPage())
                        {{--<li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
                        <span class="layui-laypage-curr"><em class="layui-laypage-em" style="background-color:#1E9FFF;"></em><em>{{ $page }}</em></span>
                    @else
                        {{--可以点击--}}
                        {{--<li><a href="{{ $url }}">{{ $page }}</a></li>--}}
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        {{--判断当前页是否为最后一页--}}
        @if ($paginator->hasMorePages())
            {{--如果当前页不为为最后一页，则下一页按钮可以点击--}}
            {{--<li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>--}}
            <a href="{{ $paginator->nextPageUrl() }}" class="layui-laypage-next">下一页</a>
        @else
            {{--否则禁止点击--}}
            {{--<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>--}}
            <a href="javascript:;" class="layui-laypage-next layui-disabled" data-page="11">下一页</a>
        @endif
    </div>
@endif
