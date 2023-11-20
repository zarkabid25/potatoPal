<div class="row">
    @forelse($buyerGroups as $buyerGroup)
        <div class="col-md-4">
            <div class="user-boxes">
                <h5>{{ $buyerGroup->name }}</h5>
                <ul>
                    <li><a href="javascript:void(0);" data-id="{{ $buyerGroup->id }}" onclick="editSBuyerGroup(this);" class="red-btn"> <span class="fa fa-edit"></span> Edit</a></li>
                    <li>
                        <form action="{{ route('buyerGroupType.destroy', ['buyerGroupType' => $buyerGroup->id]) }}" method="post">
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
