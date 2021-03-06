@extends('app')

@include('partials.datatables')

@push('js')
    <script>
    $(document).ready(function(){
        $('.files-grid').DataTable( {
            paging: false,
            order: []
        });
    });
    </script>
@endpush


@section('content')
    <div class="page_header">
        <h1><a href="{{ action('DashboardController@index') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> {{ trans('messages.files') }}</h1>
    </div>


    @include('dashboard.tabs')
    

    <div class="tab_content">
        @if ($files)
            <table class="table table-hover special">
                <thead>
                    <tr>
                        <th class="avatar"></th>
                        <th class="summary"></th>
                        <th style="width:100px" class="date hidden-xs"></th>

                    </tr>
                </thead>

                <tbody>
                    @forelse( $files as $file )


                        <tr onclick="document.location = '{{ action('FileController@show', [$file->group_id, $file->id]) }}';">
                            <td class="avatar"><span class="avatar"><img src="{{ action('FileController@thumbnail', [$file->group_id, $file->id]) }}"/></span></td>
                            <td class="content">
                                <a href="{{ action('FileController@show', [$file->group_id, $file->id]) }}">
                                    <span class="name">{{ $file->name }}</span>
                                    <span class="summary">{{summary($file->body) }}</span>
                                    <br/>
                                </a>
                                <span class="group-name"><a href="{{ action('GroupController@show', [$file->group_id]) }}">{{ $file->group->name }}</a></span>
                            </td>

                            <td class="date hidden-xs">
                                {{ $file->updated_at->diffForHumans() }}
                            </td>



                        </tr>

                    @empty
                        {{trans('messages.nothing_yet')}}
                    @endforelse
                </tbody>
            </table>


            {!! $files->render() !!}
        @else
            {{trans('messages.nothing_yet')}}
        @endif
    </div>

@endsection
