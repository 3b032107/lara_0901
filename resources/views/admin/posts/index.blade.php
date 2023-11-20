@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">文章一覽表</li>
    </ol>
    <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
        <strong>完成！</strong> 成功儲存文章
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('admin.posts.create') }}">新增</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" style="text-align: left">標題</th>
            <th scope="col" style="text-align: right">精選?</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts  as $post)
            <tr>
                <th scope="row" style="width: 50px">{{ $post->id }}</th>
                <td style="text-align: right">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td style="text-align: right">{{ ($post->is_feature)? 'v':'x' }}</td>
                <td style="width: 150px">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit',$post->id) }}">編輯</a>
                    <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" role="form">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-label">標籤：</label>
                            <input name="title" class="form-control" placeholder="請輸入文章標題" value="{{ old('title',$post->title) }}">
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">內容：</label>
                            <textarea id="content" name="content" class="form-control" rows="10"> {{ old('content',
$post->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="is_feature " class="form-label">精選？</label>
                            <select id="is_feature " name="is_feature" class="form-control" >
                                <option value="0" {{ (!$post->is_feature)? ' selected' : '' }}>否</option>
                                <option value="1" {{ ($post->is_feature)? ' selected' : '' }}>是</option>
                            </select>
                    </form>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
