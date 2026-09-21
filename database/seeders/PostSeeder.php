<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::where('email', 'superadmin@ideagrove.com')->first()
            ?? User::first();

        $categories = collect([
            ['name' => 'Craft', 'description' => 'How we build, and why.'],
            ['name' => 'Studio', 'description' => 'Notes on running a small studio in Bali.'],
            ['name' => 'Clients', 'description' => 'What the work looks like in practice.'],
        ])->mapWithKeys(function (array $data): array {
            $category = PostCategory::firstOrCreate(
                ['slug' => str($data['name'])->slug()->toString()],
                $data,
            );

            return [$data['name'] => $category];
        });

        $tags = collect(['Process', 'Design', 'Development', 'Hospitality', 'Accessibility', 'Performance', 'Bali', 'Writing'])
            ->mapWithKeys(fn (string $name): array => [
                $name => PostTag::firstOrCreate(['slug' => str($name)->slug()->toString()], ['name' => $name]),
            ]);

        $posts = [
            [
                'title' => 'Why we start with the ground',
                'category' => 'Craft',
                'tags' => ['Design', 'Process'],
                'excerpt' => 'A page needs a committed ground before it needs anything else. Here is how we pick one.',
                'body' => '<p>A page needs a committed ground before it needs anything else. A warm paper or a near-black field tells the reader where they are before they read a single word. We pick the ground first, then let the type and the grid follow from it.</p><p>This is slower than reaching for a template. It is also the difference between a page that looks like ours and a page that looks like everyone else\'s.</p>',
            ],
            [
                'title' => 'Contrast is not a checkbox',
                'category' => 'Craft',
                'tags' => ['Accessibility', 'Design'],
                'excerpt' => 'Accessibility work is design work. When contrast fails, the layout is the thing that is wrong.',
                'body' => '<p>Accessibility work is design work. When a brand colour fails contrast on a light ground, the answer is not to ship it and hope. The answer is to find the darker tone that still reads as the same brand, and use it for text.</p><p>We keep a filled brand surface and a readable brand text colour as two separate tokens. That one split removes most of the contrast problems we used to hit.</p>',
            ],
            [
                'title' => 'The work behind the work',
                'category' => 'Studio',
                'tags' => ['Process', 'Bali'],
                'excerpt' => 'We move slowly on purpose. This is what a week looks like in a two-person studio.',
                'body' => '<p>We move slowly on purpose. A two-person studio cannot win on volume, so it wins on attention. That means fewer projects, longer conversations, and a real handoff.</p><p>Most of a week is not spent writing code. It is spent understanding what the client actually needs, and removing everything that does not serve that.</p>',
            ],
            [
                'title' => 'Building for hospitality',
                'category' => 'Clients',
                'tags' => ['Hospitality', 'Design'],
                'excerpt' => 'A villa site has one job: make the guest feel the place before they arrive.',
                'body' => '<p>A villa site has one job: make the guest feel the place before they arrive. That is an editorial problem more than a technical one. The photography carries the mood, and the layout gets out of its way.</p><p>We keep the booking path short and the room pages generous. Every extra tap between a guest and a reservation is a guest we lose.</p>',
            ],
            [
                'title' => 'Fast pages are a design choice',
                'category' => 'Craft',
                'tags' => ['Performance', 'Development'],
                'excerpt' => 'Performance is not a late-stage cleanup. It is decided in the first layout conversation.',
                'body' => '<p>Performance is not a late-stage cleanup. It is decided in the first layout conversation. A hero with one image is a different page than a hero with six, and that choice is made long before anyone runs a benchmark.</p><p>We budget the weight of a page the same way we budget the number of typefaces: on purpose, early, and out loud.</p>',
            ],
            [
                'title' => 'Writing the copy first',
                'category' => 'Studio',
                'tags' => ['Writing', 'Process'],
                'excerpt' => 'Real copy in the layout from day one. Placeholder text hides every problem worth finding.',
                'body' => '<p>We put real copy in the layout from day one. Placeholder text hides every problem worth finding: the headline that runs to six lines, the label that does not fit, the section that has nothing to say.</p><p>Writing first is uncomfortable, because it forces decisions early. It also means the design is answering a real question instead of a stand-in.</p>',
            ],
        ];

        foreach ($posts as $data) {
            $slug = str($data['title'])->slug()->toString();

            if (Post::where('slug', $slug)->exists()) {
                continue;
            }

            $post = Post::create([
                'title' => $data['title'],
                'slug' => $slug,
                'excerpt' => $data['excerpt'],
                'body' => $data['body'],
                'category_id' => $categories[$data['category']]->id,
                'author_id' => $author?->id,
                'status' => Post::STATUS_PUBLISHED,
                'published_at' => now()->subDays(random_int(2, 60)),
                'is_featured' => false,
            ]);

            $post->tags()->sync(
                collect($data['tags'])->map(fn (string $name) => $tags[$name]->id)->all()
            );
        }
    }
}
