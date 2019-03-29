<div class="my-3">
  <!-- prev button -->
  @if ($page > 1)
    <a href="/todo/{{$pagename}}/{{ $page - 1 }}" class="btn btn-primary">Prev</a>
  @endif

  <!-- next button -->
  @if (count($todos) === 10)
    <a href="/todo/{{$pagename}}/{{ $page + 1 }}" class="btn btn-primary float-right">Next</a>
  @endif
</div>
