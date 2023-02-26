
@extends('layouts.website')
@section('content')
  <div class="site-wrap">
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{$post->image}}');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>
              <h1 class="mb-4"><a href="javascript:void()">{{$post->title}}</a></h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{asset('website_assets')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                <span>&nbsp;-&nbsp; {{$post->created_at->format('M d, Y')}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="site-section py-lg">
      <div class="container">

        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">

            <div class="post-content-body">
                {{$post->description}}
            </div>


            <div class="pt-5">
              <p>Categories:  <a href="#">{{$post->category->name}}</a></p>
            </div>


            <div class="pt-5">
              <h3 class="mb-5">6 Comments</h3>
                @foreach($comments as $comment)
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('website_assets')}}/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{$comment->name}}</h3>
                    <p>{{$comment->comment}}</p>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p><a href="javascript:void(0)" onclick="reply(this)" class="reply rounded heelo" data-Commentid="{{$comment->id}}">Reply</a></p>
                  </div>
                </li>
                  @foreach($replies as $reply)
                      @if($reply->comment_id == $comment->id)
                  <ul class="children">
                      <li class="comment">
                          <div class="vcard">
                              <img src="{{asset('website_assets')}}/images/person_1.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                              <h3>{{$reply->name}}</h3>
                              <div class="meta">January 9, 2018 at 2:21pm</div>
                              <p>{{$reply->reply}}</p>
                              <p><a href="javascript:void(0)" onclick="reply(this)" class="reply rounded heelo" data-Commentid="{{$comment->id}}">Reply</a></p>
                          </div>
                      </li>
                  </ul>
                      @endif
                  @endforeach

              </ul>
                @endforeach
              <!-- END comment-list -->

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="{{route('website.comment')}}" method="post" class="p-5 bg-light">
                    @csrf
{{--                  <div class="form-group">--}}
{{--                    <label for="name">Name *</label>--}}
{{--                    <input type="text" class="form-control" id="name">--}}
{{--                  </div>--}}
{{--                  <div class="form-group">--}}
{{--                    <label for="email">Email *</label>--}}
{{--                    <input type="email" class="form-control" id="email">--}}
{{--                  </div>--}}
                  <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
                <div style="display:none" class="replyDiv p-5">
                    <form action="{{route('website.reply')}}" method="post">
                        <input type="text" id="Commentid" name="Commentid" hidden="">
                        @csrf
                    <textarea name="reply"  style="height: 100px; width: 500px" placeholder="Write here"></textarea>
                    <br>
                    <button type="submit"   class="btn btn-primary" >Reply</button>
                    <a type="submit" href="javascript:void(0);"  class="btn btn-primary" onclick="reply_close(this)">Close</a>
                    </form>
                </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END sidebar-box -->

            <!-- END sidebar-box -->

            <!-- END sidebar-box -->

          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>
  </div>
    <script type="text/javascript">
        function reply(caller)
        {
            //console.log($(this).data);
           // console.log  ($('.heelo').data('Commentid')) ;
           document.getElementById('Commentid').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }
        function reply_close(caller)
        {
            $('.replyDiv').hide();
        }


    </script>
@endsection
