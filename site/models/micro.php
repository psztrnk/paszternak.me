<?php

class MicroPage extends Page {

    public function children()
    {
        $results = [];
        $pages   = [];

		//FRIENDICA
		$request = Remote::get('https://libranet.de/api/statuses/user_timeline', [
			'headers' => [
				'Authorization: Basic ' . kirby()->option('f_token')
			]
		]);
		if ($request->code() === 200) {
			$results = $request->json(false);
		}

		foreach ($results as $key => $friendica_item) {
			if ($friendica_item->in_reply_to_status_id !== null || strpos($friendica_item->text, '#pme') !== false) {
				continue;
			} else {
				if (isset($friendica_item->attachments)) {
					$pages[] = [
						'slug'     => 'friendica-' . date('Hi-Ymd', strtotime($friendica_item->created_at)),
						'template' => 'micro',
						'model'    => 'micro',
						'content'  => [
							'date'     => date('Y-m-d H:i', strtotime($friendica_item->created_at)),
							'link'     => $friendica_item->external_url,
							'text'     => $friendica_item->friendica_html,
							'pic'      => $friendica_item->attachments[0]->url,
							'source'   => 'friendica_pic'
						]
					];
				} else {
					$pages[] = [
						'slug'     => 'friendica-' . date('Hi-Ymd', strtotime($friendica_item->created_at)),
						'template' => 'micro',
						'model'    => 'micro',
						'content'  => [
							'date'     => date('Y-m-d H:i', strtotime($friendica_item->created_at)),
							'link'     => $friendica_item->external_url,
							'text'     => $friendica_item->friendica_html,
							'pic'      => null,
							'source'   => 'friendica'
						]
					];
				}
			}
		}

		//PIXELFED
		$request = Remote::get('https://psztrnk.ddns.net/api/v1/timelines/public', [
			'headers' => [
				'Authorization: Bearer ' . kirby()->option('f_token')
			]
		]);
		if ($request->code() === 200) {
			$results = $request->json(false);
		}

		foreach ($results as $key => $pixelfed_item) {
				$pages[] = [
					'slug'     => 'pixelfed-' . date('Hi-Ymd', strtotime($pixelfed_item->created_at)),
					'template' => 'micro',
					'model'    => 'micro',
					'content'  => [
						'date'     => date('Y-m-d H:i', strtotime($pixelfed_item->created_at)),
						'link'     => $pixelfed_item->url,
						'text'     => null,
						'pic'    =>   $pixelfed_item->media_attachments[0]->preview_url,
						'source'   => 'pixelfed'
					]
				];
			}

        // create a Pages collection for the child pages
        return Pages::factory($pages, $this);
    }
}
