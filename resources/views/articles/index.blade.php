<?php
/**
 * @var $article \App\Article
 */
?>
@extends('app')

@section('content')
        <!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Tab1</a></li>
    <li><a href="#tab2" role="tab" data-toggle="tab">Tab2</a></li>
    <li><a href="#tab3" role="tab" data-toggle="tab">Tab3</a></li>
</ul>
<!-- TAB CONTENT -->
<div class="tab-content">
    <div class="active tab-pane fade in" id="tab1">
        <h2>Tab1</h2>

        <p>Lorem ipsum.</p>
    </div>
    <div class="tab-pane fade" id="tab2">
        <h2>Tab2</h2>

        <p>Lorem ipsum.</p>
    </div>
    <div class="tab-pane fade" id="tab3">
        <h2>Tab3</h2>

        <p>Lorem ipsum.</p>
    </div>
</div>
<ul class="pager">
    <li><a href="#">Previous</a></li>
    <li><a href="#">Next</a></li>
</ul>
<h2 class="page-header">記事一覧</h2>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>タイトル</th>
        <th>本文</th>
        <th>作成日時</th>
        <th>更新日時</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td><?=$article->title?></td>
            <td><?=$article->body?></td>
            <td><?=$article->created_at?></td>
            <td><?=$article->updated_at?></td>
            <td><a href="/articles/show/<?=$article->id?>" class="btn btn-default btn-xs">詳細</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
