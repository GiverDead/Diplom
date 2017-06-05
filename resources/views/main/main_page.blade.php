@extends("main.layout")

@section("content")
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <div class="row">
        <div class="col-md-3" id="tools_panel">
            <div class="panel-group" id="accordion">
                @if (isset($cats)) @foreach ($cats as $id => $cat)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$id}}">
                                    {{$cat['name']}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    @if(isset($cat['objects']))
                                        @foreach($cat['objects'] as $object)
                                            <div class="col-md-6">
                                                <div class="object_panel"
                                                     @if(!empty($object['form'])) data-form="{{$object['form']}}"
                                                     @endif data-object="{{$object['name']}}">
                                                    @if(isset($object['pic']))
                                                        <img src="{{$object['pic']}}" alt="" class="object_panel_pic">
                                                    @endif
                                                    <p class="object_panel_title">{{$object['name']}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach @endif
            </div>
        </div>
        <div class="col-md-9" id="canvas">
        </div>
    </div>
    <script src="{{asset("js/konva.min.js")}}"></script>
    <script src="{{asset("js/canvas.js")}}"></script>
    <script src="{{asset("js/tools.js")}}"></script>
    <div class="modal fade" id="newObject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create new Object</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection