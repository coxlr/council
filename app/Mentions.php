<?php

namespace App;

use App\Notifications\YouWereMentioned;

class Mentions
{
    /**
     * Fetch all mentioned users within the subject's body.
     *
     * @param $body
     * @return bool
     */
    {
        preg_match_all('/@([\w\-]+)/', $body, $matches);

        return $matches[1];
    }

    /**
     * Notify all mentioned users within the subject's body.
     *
     * @param $subject
     */
    {
        User::whereIn('name', static::mentionedUsers($subject->body))
            ->get()
            ->each(function ($user) use ($subject) {
                $user->notify(new YouWereMentioned($subject));
            });
    }
