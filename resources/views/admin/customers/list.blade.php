@if(count($data) > 0)
    @foreach($data as $key=>$row)
    <tr>
        <td>{{$data->firstItem() +$key}}</td>

        <td class="table-user">
            <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$row->name ?? 'N/A'}}</a>
        </td>
        <td>
            {{$row->email ? $row->email : 'N/A'}}
        </td>
        <td>
            {{$row->phone_code}}  {{$row->phone}}
        </td>
        <td>
            {{$row->register_via}}
        </td>

        <td>
            {{$row->created_at}}
        </td>
        <td>
            @if($row->status==1)
                <span class="badge bg-soft-success text-success change-status" data-id="{{$row->id}}" data-status="0" style="cursor: pointer;">Active</span>
            @else
                <span class="badge bg-soft-danger text-danger change-status" data-id="{{$row->id}}" data-status="1" style="cursor: pointer;">In-Active</span>
            @endif
        </td>

        <td>
            
            <a href="{{route('admin.customers.show', ['id'=>$row->id])}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>

            <a href="javascript:void(0);" class="action-icon delete_record" data-id="{{$row->id}}"> <i class="mdi mdi-delete"></i></a>
        </td>
    </tr>
    @endforeach
    
    <tr>
        <td colspan="12">{{ $data->links() }}</td>
    </tr>
@else
    <tr>
        <td colspan="12" class="text-center">No Data Available</td>
    </tr>
@endif