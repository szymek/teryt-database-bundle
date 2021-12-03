<?php

/**
 * (c) FSi sp. z o.o <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FSi\Bundle\TerytDatabaseBundle\Command;

use Doctrine\Persistence\ObjectManager;
use FSi\Bundle\TerytDatabaseBundle\Teryt\Import\NodeConverter;
use FSi\Bundle\TerytDatabaseBundle\Teryt\Import\PlacesNodeConverter;
use SimpleXMLElement;
use Symfony\Component\Console\Input\InputArgument;

class TerytImportPlacesCommand extends TerytImportCommand
{
    protected function configure(): void
    {
        $this->setName('teryt:import:places')
            ->setDescription('Import places data from xml to database')
            ->addArgument('file', InputArgument::REQUIRED, 'Places dictionary xml file');
    }

    public function getNodeConverter(SimpleXMLElement $node, ObjectManager $om): NodeConverter
    {
        return new PlacesNodeConverter($node, $om);
    }

    protected function getRecordXPath(): string
    {
        return '/simc/catalog/row';
    }
}
