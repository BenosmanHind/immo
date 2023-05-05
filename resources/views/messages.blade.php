@extends('layouts.front')
@section('content')
<style>

.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<section class="gallery-section pt-80 pb-50" id="gallery-filter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-nav text-center mb-50">
                    <ul class="filter-btn">
                        <li><a href="{{ asset('/app') }}" >Annonces</a></li>
                        <li class="active"><a href="{{ asset('app/messages') }}">Messages</a></li>
                        <li><a href="{{ asset('/favorite') }}" >Favoris</a></li>
                        <li ><a href="{{ asset('/app/notifications') }}" >Notifications</a></li>
                        <li><a href="{{ asset('/app/profile') }}">Profil</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    @if($conversations == Null)
    <p>Aucun message disponible</p>
    @endif
<div class="row clearfix">
    <div class="col-lg-12">
            <div class="card chat-app">
             <div id="plist" class="people-list">
                    @if($conversations)
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Rechercher...">
                    </div>
                    @endif
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        @foreach($conversations as $conversation)
                        @if($loop->first )
                        <li class="clearfix active">
                        <img src="{{ asset('front/assets/images/user.png') }}" alt="avatar">
                        @if(Auth::user()->id == $conversation->sender_id)
                            <div class="about">
                                <div class="name">{{ $conversation->recipient->first_name }} {{ $conversation->recipient->last_name }} </div>
                                <div class="status"> <i class="fa fa-circle offline"></i> Il ya un jour </div>
                            </div>
                        </li>
                        @else
                        <div class="about">
                            <div class="name">{{ $conversation->sender->first_name }} {{ $conversation->sender->last_name }} </div>
                            <div class="status"> <i class="fa fa-circle offline"></i> Il ya un jour </div>
                        </div>
                        @endif
                        @else
                        <a href="{{ url('messages/'.$conversation->id) }}">
                            <li class="clearfix">
                                <img src="{{ asset('front/assets/images/user.png') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">{{ $conversation->recipient->first_name }} {{ $conversation->recipient->last_name }} </div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> Il ya 2 jours </div>
                                </div>
                            </li>
                        </a>
                        @endif
                        @endforeach
                    </ul>
                </div>

                @if($messages)
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="chat-about">
                                    @if(Auth::user()->id == $conversation->sender_id)
                                    <h6 class="m-b-0">{{ $last_conversation->recipient->first_name }} {{ $last_conversation->recipient->last_name }}</h6>
                                    @else
                                    <h6 class="m-b-0">{{ $last_conversation->sender->first_name }} {{ $last_conversation->sender->last_name }}</h6>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0 add-li">
                            @foreach($messages as $message)
                            @if($message->sender_id == Auth::user()->id)
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time">{{ $message->created_at->format('Y-m-d H:m') }}</span>
                                    <img src="{{ asset('front/assets/images/user.png') }}" alt="avatar">
                                </div>
                                <div class="message other-message float-right"> {{ $message->message }} </div>
                            </li>
                            @else
                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">{{ $message->created_at->format('Y-m-d H:m') }}</span>
                                </div>
                                <div class="message my-message">{{ $message->message }}</div>
                            </li>
                            @endif
                            <input type="hidden" id="recipient" value="{{ $message->sender_id }}">
                            <input type="hidden" id="sender" value="{{ $message->recipient_id }}">
                            <input type="hidden" id="announcement" value="{{ $message->property_id }}">
                            @endforeach

                        </ul>
                    </div>

                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                            <button  type="button" class="add-message"> <span class="input-group-text"><i class="fa fa-send"></i></span></button>
                            </div>
                            <input type="text" id="message" class="form-control " placeholder="Entrez le texte ici...">
                        </div>
                    </div>

                </div>
                @endif
            </div>

    </div>
</div>
</div>

@endsection
@push('message-scripts')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".add-message").on("click", function (e)
    {
        var message = $('#message').val();
        var recipient = $('#recipient').val();
        var sender = $('#sender').val();
        var announcement = $('#announcement').val();

        var data = {
            "_token": "{{ csrf_token() }}",
            message: message,
            recipient: recipient,
            sender: sender,
            announcement:announcement
        };

        $.ajax(
                {
                    url: "/messages",
                    type: "POST",
                    data: data,
                    success: function (res) {
                       $('.add-li').append(
                        '<li class="clearfix">'+
                            '<div class="message-data text-right">'+
                                '<span class="message-data-time">'+res.date+'</span>'+
                            '</div>'+
                            '<div class="message other-message float-right">'+res.message+'</div>'+
                        '</li>'
                        );
                        $('#message').val('');

                 }
                });
        e.preventDefault();
    });

</script>
@endpush
