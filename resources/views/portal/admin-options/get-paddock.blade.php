<div class="row">
    @forelse($paddocks as $paddock)
        <div class="col-md-4">
            <div class="user-boxes">
                <h5>{{ $paddock->paddock_name }}</h5>
                <h5>{{ $paddock->no_of_hectares }}</h5>
                <ul>
                    <li><a href="javascript:void(0);" data-id="{{ $paddock->id }}" onclick="editPaddock(this);" class="red-btn"> <span class="fa fa-edit"></span> Edit</a></li>
                    <li>
                        <form action="{{ route('paddock.destroy', ['paddock' => $paddock->id]) }}" method="post">
                            @method('delete')
                            @csrf

                            <button type="submit" style="background-color: unset; border: none" class="trash-btn">
                                <span class="fa fa-trash-o"></span></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @empty
    @endforelse
    <!-- col -->
</div>
