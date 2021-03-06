<?php declare(strict_types=1);

namespace Wnx\LaravelStats\Classifiers;

use Wnx\LaravelStats\ReflectionClass;
use Wnx\LaravelStats\Contracts\Classifier;
use  Livewire\Component;

class LivewireComponentClassifier implements Classifier
{
    public function name(): string
    {
        return 'Livewire Components';
    }

    public function satisfies(ReflectionClass $class): bool
    {
        return $class->isSubclassOf(Component::class);
    }

    public function countsTowardsApplicationCode(): bool
    {
        return true;
    }

    public function countsTowardsTests(): bool
    {
        return false;
    }
}
