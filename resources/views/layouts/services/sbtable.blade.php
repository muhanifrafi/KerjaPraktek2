<div class="d-flex pb-4">
@if($ac == '')
	<h4><span class="badge badge-success">Aircraft: All</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
    @else
    <h4><span class="badge badge-success">Aircraft: {{$ac}}</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
    @endif
	<h4><span class="badge badge-warning">Category : {{$e_categ}}</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
    @if ($cat == "n_no")
    @php $categ = "SB No."; @endphp
    @elseif($cat == "a.n_title")
    @php $categ = "Title"; @endphp
    @elseif($cat == "e_effectivity")
    @php $categ = "Effectivity"; @endphp
    @else
    @php $categ = ""; @endphp
    @endif
	<h4><span class="badge badge-info">Search by : {{$categ}}</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
	<h4><span class="badge badge-primary">Key : {{$s}}</span> <span class="fa fa-arrow-right"></span>
	</h4>&nbsp;
</div>
    <table class="table table-striped table-bordered table-hover table-heading no-border-bottom" cellspacing=0 id="delTable">
    <thead>
      <tr>
        <th>Id.</th>
        <th>plane</th>
        <th>Service Bulletin</th>
        <th>Title</th>
        <th>Revision</th>
        <th>Rev. date</th>
        <th>Category</th>
        <th>Effectivity</th>
      </tr>
    </thead>
    <tbody id="the-list">
        @php $i=0; @endphp
        @foreach ($sbs as $key => $sb)
        @if ($i%2 == 0)
		@php $ev = "alternate"; @endphp
		@else
		@php $ev = "alternate2"; @endphp
		@endif
		@php $i++; @endphp
        <tr id="{{$sb -> id}}" class="{{$ev}}">
                <td>{{$sbs->firstItem() + $key}}</td>
                <td>{{ $sb->air_title }}</td>
                <td>{{ $sb->n_no }}</td>
                <td>{{ $sb->n_title }}</td>
                <td>{{ $sb->n_rev }}</td>
                <td>{{ $sb->e_rev_date }}</td>
                <td>@if (strpos(strtolower($sb->e_categ), 'mandatory') !== false)
                    <h6><span class="badge badge-danger">{{$sb->e_categ}}</span>
                    @elseif(strpos(strtolower($sb->e_categ), 'recommended') !== false)
                    <h6><span class="badge badge-warning">{{$sb->e_categ}}</span>
                    @elseif(strpos(strtolower($sb->e_categ), 'optional') !== false)
                    <h6><span class="badge badge-success">{{$sb->e_categ}}</span>
                    @endif
                </td>
                <td>{{ $sb->e_effectivity }}</td>
                </td>
            </tr>
        @endforeach
        </td>
        </tr>
    </tbody>
</table>
<!-- supaya pagination tidak error alangkah baiknya untuk menyesuaikan variable dengan yang ada di include.pagination
dimana didalamnya saya misalkan a=lastpage b = total c= url supaya tidak perlu untuk membuat pagination berulang -->
@php $a = $sbs->lastPage();
$b = $sbs->total();
$c="/sb";
@endphp
@include('includes.pagination')