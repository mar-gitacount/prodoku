<div class="container">
    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                タレコミ一覧
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach ($tarekomis as $item)
                            @csrf
                            <tr>
                                <td class="table-text">
                                    <div class="table-text">
                                        <a href = "{{ route('admin.article_tarekomi', ['tarekomi' => $item->title])}}">
                                            {{$item -> title}}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>