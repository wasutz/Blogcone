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
        $post = Post::create([
        	'title' => 'China hits back at US over South China Sea claims',
        	'content' => "China has asserted its indisputable sovereignty over parts of the South China Sea after the Trump administration vowed to prevent China from taking territory in the region.
The Chinese foreign ministry said Beijing would remain firm to defend its rights in the region.
White House spokesman Sean Spicer said on Monday the US would make sure we protect our interests there.
Barack Obama's administration refused to take sides in the dispute.
It did, however, send B-52 bombers and a naval destroyer last year, and the then US Secretary of State John Kerry spoke out over what he called an increase of militarisation from one kind or another in the region.
Several nations claim territory in the resource-rich South China Sea, which is also an important shipping route.",
        	'user_id' => 1,
            'published' => config('post.published')
        ]);

        $post->addTags(["China", "News", "War"]);

        $post = Post::create([
            'title' => 'Trump presidency week two: Foot still on accelerator',
            'content' => "President Trump's first week in office was widely regarded as a whirlwind.
His second week has been no less hectic. Despite the mass protests of week one and falling approval ratings, the administration appears to be doubling down on its pledge to shake up the Washington playbook.
In a divided America, many people are repelled by the agenda and tone of this administration, while many others are pleased that their president is taking a bold stand and getting things done.
Here are five key things from week two in Trumpland.",
            'user_id' => 1,
            'published' => config('post.published')
        ]);

        $post->addTags(["Trump", "News"]);

        $post = Post::create([
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
            'published' => config('post.published')
        ]);

        $post->addTags(["Model", "News", "Fashion"]);

        $post = Post::create([
            'title' => "France election: Centrist rising star Macron urges unity",
            'content' => "The centrist candidate shaking up the French presidential campaign has vowed to unite the nation and boost ties with Germany in a major speech.
Emmanuel Macron also promised to boost defence spending when he spoke to a crowd in the eastern city of Lyon.
The former Socialist economy minister set up his own party only last year.
Opinion polls suggest he may face off with the far right's Marine Le Pen, who is to deliver a keynote speech on Sunday, in the second round of voting.
Her National Front (FN) party began a two-day rally, also in Lyon, to promote its manifesto, which promises to restore French sovereignty over the country's budget, borders, money and laws.",
            'user_id' => 2,
            'published' => config('post.published')
        ]);

        $post->addTags(["France", "News", "Germany"]);

        $post = Post::create([
            'title' => "Romania protesters await corruption decree repeal",
            'content' => "Romania's government is to hold an urgent meeting to scrap a decree that would have shielded many politicians from prosecution for corruption.
The decree triggered the largest street protests in the country since the fall of communism in 1989. Tens of thousands of protesters in Bucharest cheered the move, but vowed to keep the pressure on the cabinet.
They said they would continue their rallies until the decree - which was passed on Tuesday and was due to come into effect on 10 February - was actually repealed.
Some protesters are still demanding the resignation of the entire government.",
            'user_id' => 2,
            'published' => config('post.published')
        ]);

        $post->addTags(["Romania", "News", "Protest", "Politic"]);

        $post = Post::create([
            'title' => "Scientists crack why eating sounds can make people angry",
            'content' => "Why some people become enraged by sounds such as eating or breathing has been explained by brain scan studies.
The condition, misophonia, is far more than simply disliking noises such as nails being scraped down a blackboard. Olana developed the condition when she was eight years old. Her trigger sounds include breathing, eating and rustling noises. Scientists, including Olana, at multiple centres in the UK scanned the brains of 20 misophonic people and 22 people without the condition.
They were played a range of noises while they were in the MRI machine, including:
neutral sounds such as rain
generally unpleasant sounds such as screaming
people's trigger sounds",
            'user_id' => 2,
            'published' => config('post.published')
        ]);

        $post->addTags(["Scientist", "News", "Noise"]);

        $post = Post::create([
            'title' => "Silicon Valley strikes back",
            'content' => "The week began with Silicon Valley bosses coming out of their shells and speaking out against President Trump's immigration policy.
But by the end they were turning their minds to other matters - some spectacular results from Facebook and Apple and the prospect of the biggest stock market debut by a tech firm for years.
On my Tech Tent podcast this week, we discuss the hopes and fears of Silicon Valley as Snapchat owner Snap gets ready to hit the New York Stock Exchange.
We also hear from a London tech chief on his worries about the US migration policy. And you'll be pleased to hear there's a gadget on the show as we find out how augmented reality may enter the classroom.",
            'user_id' => 2,
            'published' => config('post.published')
        ]);

        $post->addTags(["Tech", "Silicon Valley"]);


        $post = Post::create([
            'title' => "Louvre attack: Egyptian man, 29, believed to be assailant",
            'content' => "French authorities say they believe the man who tried to attack the Louvre museum in the capital Paris on Friday was a 29-year-old Egyptian man.
Prosecutor Francois Molins said he is thought to have travelled to Paris from Dubai on a tourist visa last month.
Police are trying to establish if the man acted alone or under instructions, he added.
The machete-wielding attacker was critically injured after he was shot by French soldiers in a bid to stop him.
One of the soldiers received minor injuries when the man tried to enter the museum.
At the time of the incident, hundreds of visitors were inside the Louvre, which is home to numerous celebrated art works, including the Mona Lisa.",
            'user_id' => 3,
            'published' => config('post.review')
        ]);

        $post->addTags(["Egypt", "News", "Attack"]);

        $post = Post::create([
            'title' => "Why is Asia demanding so much baby formula?",
            'content' => "<h1>UK consumer goods giant Reckitt Benckiser is betting big on Asia's growing thirst for infant formula.</h1>
<p>Getting more sales in that region was a major reason it gave for Thursday's $16.7bn (£13.3bn) bid for US firm Mead Johnson - the world's second-biggest maker of the product.
Baby milk formula is big business. Globally sales were worth $41bn in 2014, according to Euromonitor.
And Asia is comfortably the fastest-growing market. But why?
Chinese baby bonanza
China's 2015 decision to scrap its one-child policy has huge implications not just for demographics, but for consumer-oriented businesses such as Reckitt and Mead.
Couples are now allowed to have two children after concerns about China's ageing population led the government to reverse the decades-long rule.</p>",
            'user_id' => 3,
            'published' => config('post.review')
        ]);

        $post->addTags(["Asia", "News", "Baby"]);
    }
}
