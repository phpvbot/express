<?php

namespace Vbot\Express;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;
use Qbhy\Express\Express as QbhyExpress;

class Express extends AbstractMessageHandler
{

    public $author = '96qbhy';

    public $name = 'express';

    public $zhName = '快递查询';

    public $version = '1.0';

    public function register()
    {
        // TODO: Implement register() method.
    }

    public function handler(Collection $message)
    {
        if ($message['type'] === 'text' and strpos($message['content'], '查快递 ') === 0 and strlen($message['content']) > 4) {
            $postId = str_replace('查快递 ', '', $message['content']);
            $username = $message['from']['UserName'];
            $result = QbhyExpress::query($postId);
            if (is_string($result)) {
                return Text::send($username, $result);
            } else if ($result['status'] === 6) {
                $str = "快递单号: $postId, 快递公司: $result[company]" . PHP_EOL;
                foreach ($result['data'] as $item) {
                    $str .= '| ' . $item['context'] . ' - ' . $item['time'] . PHP_EOL;
                }
                return Text::send($username, $str);
            } else {
                return Text::send($username, $result['reason']);
            }
        }
        return null;
    }
}