<td>{!!$notification->type == 'App\Notifications\LinkUpdated' ? (snake_case(class_basename($notification->type))).' - Link updated' : 'set other notification type'!!}</td>
<td>{!!$notification->data['link_updated']['date']!!}</td>
<td>{!!$notification->read_at == null ? '0' : '1'!!}</td>
