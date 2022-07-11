<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>Posts</title>
    <link rel="stylesheet" href={{asset("style.css")}}>

</head>

<body>
<div id="preloader">
    <div class="preload-content">
        <div id="original-load"></div>
    </div>
</div>

<div class="single-blog-wrapper section-padding-0-100">
    <div class="single-blog-area blog-style-2 mb-50">
        <div class="single-blog-thumbnail">
            <img src={{asset("img/bg-img/b2.png")}} alt="">
            <div class="post-tag-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">

                <div class="single-blog-area blog-style-2 mb-50">
                    @foreach($posts as $post)

                        <div class="single-blog-content">
                            <h4><a href="/posts/{{$post->getId()}}" class="post-headline mb-0">{{$post->getTitle()}}</a></h4>
                            <p>{{$post->getDescription()}}</p>
                            <p>{{$post->getCreatedAt()}}</p>
                        </div>
                    @endforeach
                </div>

                <div class="post-a-comment-area mt-70">
                    <h5>Create New Post</h5>
                    <form method="POST" action="/posts">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="group">
                                    <input type="text" name="title" id="title" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Title</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group">
                                    <input type="text" name="description" id="description" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Description</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn original-btn">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src={{asset("js/jquery/jquery-2.2.4.min.js")}}></script>

<script src={{asset("js/popper.min.js")}}></script>

<script src={{asset("js/bootstrap.min.js")}}></script>

<script src={{asset("js/plugins.js")}}></script>

<script src={{asset("js/active.js")}}></script>

</body>

</html>
