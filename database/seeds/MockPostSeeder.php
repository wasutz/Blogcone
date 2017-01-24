<?php

use Illuminate\Database\Seeder;

use App\Post;

class MockPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
        	'title' => 'China hits back at US over South China Sea claims',
        	'content' => "China has asserted its indisputable sovereignty over parts of the South China Sea after the Trump administration vowed to prevent China from taking territory in the region.
The Chinese foreign ministry said Beijing would remain firm to defend its rights in the region.
White House spokesman Sean Spicer said on Monday the US would make sure we protect our interests there.
Barack Obama's administration refused to take sides in the dispute.
It did, however, send B-52 bombers and a naval destroyer last year, and the then US Secretary of State John Kerry spoke out over what he called an increase of militarisation from one kind or another in the region.
Several nations claim territory in the resource-rich South China Sea, which is also an important shipping route.",
        	'user_id' => 1,
        ]);

        Post::create([
        	'title' => "Model Hanne Gaby Odiele reveals she is intersex to 'break taboo'",
        	'content' => "A top fashion model has revealed that she is intersex, saying that she hopes speaking out will help break a taboo.
Hanne Gaby Odiele, 29, was born with undescended testicles, which were removed when she was 10 after doctors warned that they could cause cancer.
Intersex people are born with a mixture of male and female sex characteristics.
According to the United Nations, the condition affects up to 1.7% of the world's population.
Ms Odiele, originally from Belgium, was born with androgen insensitivity syndrome (AIS), which causes girls to have XY chromosomes usually found in boys. It is very important to me in my life right now to break the taboo,she told USA Today in an interview. At this point, in this day and age, it should be perfectly all right to talk about this.
At 10, Ms Odiele had surgery to remove her testes.
I knew at one point after the surgery I could not have kids, I was not having my period. I knew something was wrong with me, she said.
She had additional surgery at 18 to reconstruct her vagina.
But she said the procedures caused her distress and she wanted to speak out in part to discourage other parents from putting their children through perhaps unnecessary surgery.",
        	'user_id' => 2,
        ]);
    }
}
