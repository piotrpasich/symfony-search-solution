<?php

namespace PP\AcmeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PP\AcmeBundle\Entity\Post;
use Symfony\Component\DomCrawler\Crawler;

class GenerateRandomContentCommand  extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('pp:generate')
            ->setDescription('Generate random command')
            ->addArgument('n', InputArgument::REQUIRED, 'Count of generated posts?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $postsCount = $input->getArgument('n');
        $em = $this->getContainer()->get('doctrine')->getManager();

        for ($i=0; $i<$postsCount; $i++) {
            $html = @file_get_contents('http://en.wikipedia.org/wiki/Special:Random');

            if (null == $html) {
                $i--;
                continue;
            }

            $crawler = new Crawler($html);
            $title   = $crawler->filter('#firstHeading span')->first()->text();
            $content = $crawler->filter('#mw-content-text')->first()->text();
            $author  = $title;
            $post = Post::create($title, $content, array(), $author);

            $em->persist($post);
            $output->writeln($title);
            $em->flush();
        }

        $output->writeln('Saved');
    }
}
