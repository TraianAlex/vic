<td>{!!(snake_case(class_basename($notification->type)))!!}</td>
<td>category name: {!!$notification->data['name']!!}</td>
<td>{!!$notification->read_at == null ? '0' : '1'!!}</td>
