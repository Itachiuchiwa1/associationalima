<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Activity;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Media;
use App\Models\AnonymousQuestion;
use App\Models\AnonymousAnswer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin DÉMÉ',
            'email' => 'admin@deme.fr',
            'password' => bcrypt('password'),
        ]);

        // Create categories
        $categories = [
            ['name' => 'Formation', 'color' => '#00D4FF', 'icon' => '📚'],
            ['name' => 'Santé & Bien-être', 'color' => '#06B6D4', 'icon' => '💚'],
            ['name' => 'Environnement', 'color' => '#10B981', 'icon' => '🌱'],
            ['name' => 'Éducation', 'color' => '#F59E0B', 'icon' => '✏️'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => \Str::slug($cat['name']),
                'description' => 'Catégorie ' . $cat['name'],
                'color' => $cat['color'],
                'icon' => $cat['icon'],
            ]);
        }

        // Create posts
        $posts = [
            [
                'title' => 'L\'importance de l\'éducation dans les communautés',
                'content' => 'L\'éducation est le fondement du développement durable. Chez DÉMÉ, nous croyons fermement que chaque enfant mérite accès à une éducation de qualité.',
                'excerpt' => 'Découvrez pourquoi l\'éducation est primordiale pour le développement.',
                'category_id' => 4,
            ],
            [
                'title' => 'Témoignages de volontaires: Une expérience transformatrice',
                'content' => 'Nos volontaires témoignent de comment travailler avec DÉMÉ a changé leur perspective sur la vie et l\'engagement communautaire.',
                'excerpt' => 'Les histoires inspirantes de nos volontaires engagés.',
                'category_id' => 1,
            ],
            [
                'title' => 'Bien-être mental: Un sujet que nous ne devons pas ignorer',
                'content' => 'Le bien-être mental est tout aussi important que la santé physique. DÉMÉ soutient les initiatives de sensibilisation à la santé mentale.',
                'excerpt' => 'Comprendre l\'importance de la santé mentale dans nos communautés.',
                'category_id' => 2,
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => \Str::slug($post['title']),
                'content' => $post['content'],
                'excerpt' => $post['excerpt'],
                'category_id' => $post['category_id'],
                'user_id' => $admin->id,
                'status' => 'published',
                'published_at' => now()->subDays(rand(1, 30)),
            ]);
        }

        // Create activities
        $activities = [
            [
                'title' => 'Formation Professionnelle: Compétences Numériques',
                'description' => 'Découvrez comment développer vos compétences en technologie avec nos formations pratiques.',
                'content' => 'Une formation complète sur les outils numériques essentiels du marché du travail actuel.',
                'category_id' => 4,
                'event_date' => now()->addDays(15),
                'location' => 'Centre DÉMÉ - Paris',
                'participant_count' => 45,
            ],
            [
                'title' => 'Campagne Nettoyage Environnemental',
                'description' => 'Rejoignez-nous pour nettoyer et revitaliser nos espaces publics!',
                'content' => 'Une activité communautaire pour un environnement plus propre et sain.',
                'category_id' => 3,
                'event_date' => now()->addDays(22),
                'location' => 'Parc Central - Lyon',
                'participant_count' => 120,
            ],
            [
                'title' => 'Atelier Santé Mentale et Bien-être',
                'description' => 'Explorez des techniques de gestion du stress et de bien-être personnel.',
                'content' => 'Un espace sécurisé pour discuter et apprendre sur la santé mentale.',
                'category_id' => 2,
                'event_date' => now()->addDays(8),
                'location' => 'Centre Wellness DÉMÉ',
                'participant_count' => 30,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create([
                'title' => $activity['title'],
                'slug' => \Str::slug($activity['title']),
                'description' => $activity['description'],
                'content' => $activity['content'],
                'category_id' => $activity['category_id'],
                'event_date' => $activity['event_date'],
                'location' => $activity['location'],
                'participant_count' => $activity['participant_count'],
                'status' => 'active',
            ]);
        }

        // Create testimonials
        $testimonials = [
            [
                'author_name' => 'Marie Dupont',
                'author_role' => 'Volontaire',
                'content' => 'DÉMÉ m\'a transformé. J\'ai trouvé un sens à ma vie à travers le bénévolat et la communauté. Merci!',
                'rating' => 5,
            ],
            [
                'author_name' => 'Jean Christophe',
                'author_role' => 'Bénéficiaire',
                'content' => 'Les formations de DÉMÉ m\'ont permis de trouver un emploi stable. Je suis infiniment reconnaissant.',
                'rating' => 5,
            ],
            [
                'author_name' => 'Sarah Ahmad',
                'author_role' => 'Partenaire',
                'content' => 'Travailler avec DÉMÉ a été une expérience enrichissante. Leur engagement envers les communautés est admirable.',
                'rating' => 5,
            ],
            [
                'author_name' => 'Pierre Moreau',
                'author_role' => 'Participant',
                'content' => 'Les activités communautaires me permettent de me sentir utile et connecté à mon environnement.',
                'rating' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create([
                'author_name' => $testimonial['author_name'],
                'author_role' => $testimonial['author_role'],
                'content' => $testimonial['content'],
                'rating' => $testimonial['rating'],
                'status' => 'approved',
            ]);
        }

        // Create galleries
        $galleries = [
            ['title' => 'Événements 2024', 'description' => 'Moments mémorables de nos événements cette année.'],
            ['title' => 'Activités Communautaires', 'description' => 'Nos initiatives et actions dans les communautés.'],
            ['title' => 'Formations & Ateliers', 'description' => 'Moments de partage et d\'apprentissage.'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create([
                'title' => $gallery['title'],
                'slug' => \Str::slug($gallery['title']),
                'description' => $gallery['description'],
            ]);
        }

        // Create anonymous questions
        $questions = [
            [
                'question' => 'Comment puis-je contribuer à votre association si je ne suis pas en bonne santé?',
                'category' => 'Général',
                'status' => 'approved',
            ],
            [
                'question' => 'Y a-t-il des opportunités de formation à temps partiel?',
                'category' => 'Formation',
                'status' => 'approved',
            ],
            [
                'question' => 'Comment puis-je aider sans quitter mon emploi?',
                'category' => 'Général',
                'status' => 'approved',
            ],
        ];

        foreach ($questions as $question) {
            AnonymousQuestion::create([
                'question' => $question['question'],
                'category' => $question['category'],
                'status' => $question['status'],
            ]);
        }

        // Create answers to questions
        $firstQuestion = AnonymousQuestion::first();
        if ($firstQuestion) {
            AnonymousAnswer::create([
                'question_id' => $firstQuestion->id,
                'answer' => 'Il existe de nombreuses façons de contribuer, pas nécessairement physiquement. Vous pouvez aider avec de l\'expertise, du soutien administratif, ou même financièrement.',
                'user_id' => $admin->id,
            ]);
            $firstQuestion->update(['is_answered' => true]);
        }
    }
}
