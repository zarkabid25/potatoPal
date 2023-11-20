@extends('components.layouts')
@section('content')
    <div class="container">
        <form action="{{ route('store.tia_sample') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="tia_id" value="${receival.id}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inspection_no">Inspection No.</label>
                        <input type="text" id="inspection_no" name="inspection_no" class="form-control" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" value="${receival.created_at}" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grower_name">
                    <div class="form-group">
                        <label for="grower_name">Grower Name</label>
                        <input type="text" name="grower_name" value="${receival.receival.grower_name}" id="grower_name" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 seed_variety">
                    <div class="form-group">
                        <label for="seed_variety">Seed Variety</label>
                        <select name="seed_variet[]" id="seed_variety" class="js-example-tags form-control" multiple="multiple">
                            ${generateSelectOptions(receival.seed_variety)}
                        </select>

                    </div>
                </div>

                <div class="col-md-6 seed_generation">
                    <div class="form-group">
                        <label for="seed_generation">Seed Generation</label>
                        <select name="seed_generation[]" id="seed_generation" class="js-example-tags form-control" multiple="multiple">
                            ${generateSelectOptions(receival.seed_generation)}
                        </select>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group grower_docket">
                        <label for="grower_docket">Grower Docket</label>
                        <input type="text" name="grower_docket" id="grower_docket" value="${receival.receival.grower_docket_no ? receival.receival.grower_docket_no : ''}" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cool_store">Coolstore</label>
                        <input type="text" name="cool_store" id="cool_store" style="pointer-events: none" value="Cherry Hills" class="form-control" />
                    </div>
                </div>

                <div class="col-md-6 paddock_no">
                    <div class="form-group">
                        <label for="paddock_no">Paddock No.</label>
                        <select name="paddock_no[]" id="paddock_no" class="js-example-tags form-control" multiple="multiple">
                            ${generateSelectOptions(receival.paddock_name)}
                        </select>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="processor">Processor</label>
                        <input type="text" name="processor" id="processor" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Size:</label>
                    <div class="selector">
                        <div class="selector-item">
                            <input type="radio" id="size1" value="30-350g" name="size" class="selector-item_radio" checked>
                            <label for="size1" class="selector-item_label">30-350g</label>
                        </div>
                        <div class="selector-item">
                            <input type="radio" id="size2" value="90mm" name="size" class="selector-item_radio">
                            <label for="size2" class="selector-item_label">90mm</label>
                        </div>
                        <div class="selector-item">
                            <input type="radio" value="70mm" id="size3" name="size" class="selector-item_radio">
                            <label for="size3" class="selector-item_label">70mm</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tonnes">Tonnes: </label>
                        <input type="text" name="tonnes" class="form-control" id="tonnes" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="destination">Destination: </label>
                        <input type="text" name="destination" class="form-control" id="destination" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field_rating">Field Rating: </label>
                        <input type="text" name="field_rating" class="form-control" id="field_rating" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="labels">Labels: </label>
                        <input type="text" name="labels" class="form-control" id="labels" />
                    </div>
                </div>
            </div>

            <table style="margin-top: 60px;" class="table">
                <thead></thead>
                <tbody>

                @include('portal.tia-sample.tia-table')

                </tbody>
            </table>

            <div class="row">
                <div class="col-md-3">
                    <p>Regrading
                        <span>
                    <label class="switch">
                      <input type="checkbox" name="regrading">
                      <span class="slider round"></span>
                    </label>
                </span></p>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-2">
                            <p>Comment</p>
                        </div>

                        <div class="col-md-10">
                            <input type="text" name="comment" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 30px; display: flex; justify-content: center;">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2" style="padding-top: 10px">
                            <label style="margin-right: 5px">Result:</label>
                        </div>
                        <div class="col-md-10">
                            <div class="selector">
                                <div class="selector-item">
                                    <input type="radio" id="result1" name="result" value="certified" class="selector-item_radio" checked>
                                    <label for="result1" class="selector-item_label" style="font-size: 12px; padding-top: 5px">Certified</label>
                                </div>
                                <div class="selector-item">
                                    <input type="radio" id="result2" name="result" value="not_certified" class="selector-item_radio">
                                    <label for="result2" class="selector-item_label" style="font-size: 12px; padding-top: 5px">Not Certified</label>
                                </div>
                                <div class="selector-item">
                                    <input type="radio" id="result3" name="result" value="registered" class="selector-item_radio">
                                    <label for="result3" class="selector-item_label" style="font-size: 12px; padding-top: 5px">Registered</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="margin-top: 15px">
                    <label for="tia_img">TIA Sample Image</label>

                    <div>
                        <a class="btn" id="custom-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                            text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Choose Image</a>
                            <div id="selected-image"></div>
                            <input type="file" id="file-input" name="tia_sample_img" style="display: none" accept="image/*">
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 40px; text-align: end">
                    <a href="javascript:void(0);" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Export Sample to Excel</a>
                </div>
            </div>

            <div style="margin-top: 20px; display: flex; justify-content: end">
        <span style="padding-right: 5px">
            <button type="button" class="add-button" data-dismiss="modal" style="background: #E22827; border: 1px solid #E22827; color: #fff;
        text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Close</button>
        </span>

                <span>
            <button type="submit" class="add-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
        text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Submit</button>
        </span>
            </div>
        </form>
    </div>
@endsection

@section('JS')

@endsection
