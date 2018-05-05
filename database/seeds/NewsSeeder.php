<?php

use App\News;

class NewsSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = $this->getData('news.json');

        $this->seedNews($news);
    }

    private function seedNews($news)
    {
        foreach ($news as $newsItem) {
            $seededNewsItem = News::create([
                'title'  => $newsItem->title->sv,
                'slug'   => str_slug($newsItem->title->sv),
                'banner' => isset($newsItem->banner) ? $newsItem->banner : null,
                'post'   => $newsItem->post->sv,
            ]);

            $this->translate($seededNewsItem, $newsItem);
        }
    }
}
