<?php

namespace Tests\Model;

use Awork\Collections\UserCollection;
use Awork\Model\Comment;
use Awork\Model\User;

it('creates a model from data', function () {
    $fixture = getJsonFixture('comment.json');

    $comment = new Comment($fixture);

    expect($comment->getId())->toBe('2e6248f1-fdf6-4dae-9ee7-5579d806b457');
    expect($comment->getEntityType())->toBe('tasks');
    expect($comment->getEntityId())->toBe('3fa85f64-5717-4562-b3fc-2c963f66afa6');
    expect($comment->getUser())->toBeInstanceOf(User::class);
    expect($comment->getMentions())->toBeInstanceOf(UserCollection::class);
    expect($comment->getFormattedMessage())->toBe('Hey team, the customer loved the latest designs!');
    expect($comment->getPlainFormattedMessage())->toBe('Hey team, the customer hated the latest designs!');
});
