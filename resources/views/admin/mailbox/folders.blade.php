<div class="card">
    <div class="card-header">
      <h3 class="card-title">Folders</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item active">
          <a href="{{route("admin.mailbox.inbox")}}" class="nav-link">
            <i class="fas fa-inbox"></i> Inbox
            <span class="badge bg-success float-right">{{$messagesNotReaded}}</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route("admin.mailbox.sent")}}" class="nav-link">
            <i class="far fa-envelope"></i> Sent
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route("admin.mailbox.favorite")}}" class="nav-link">
            <i class="far fa-star"></i> Favorite
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route("admin.mailbox.readed")}}" class="nav-link">
            <i class="fa fa-eye"></i> Readed
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route("admin.mailbox.trash")}}" class="nav-link">
            <i class="far fa-trash-alt"></i> Trash
          </a>
        </li>
      </ul>
    </div>
    <!-- /.card-body -->
  </div>