<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'SOLID',
            'content' =>
<<<CONTENT
<p class="fst-italic">This article is about the SOLID principles of object-oriented programming. For
 the fundamental state of matter, see Solid. For other uses, see Solid (disambiguation).</p>
<p>In software engineering, SOLID
 is a mnemonic acronym for five design principles intended to make software designs more
 understandable, flexible, and maintainable. The principles are a subset of many principles promoted
 by American software engineer and instructor Robert C. Martin,[1][2][3] first introduced in his
 2000 paper Design Principles and Design Patterns.[2][4]</p>
<p>The SOLID ideas are The</p>
<ul><li>single-responsibility principle: "There should never be more than one reason for a class to
 change."[5] In other words, every class should have only one responsibility.[6]</li>
<li>The open-closed principle: "Software entities ... should be open for extension, but closed for
 modification."[7]</li>
<li>The Liskov substitution principle: "Functions that use pointers or references to base classes must
 be able to use objects of derived classes without knowing it."[8] See also design by contract.[8]</li>
<li>The interface segregation principle: "Many client-specific interfaces are better than one
 general-purpose interface."[9][4]</li>
<li>The dependency inversion principle: "Depend upon abstractions, [not] concretions."[10][4]</li></ul>
<p>The SOLID acronym was introduced later, around 2004, by Michael Feathers.[11]</p>
<p>Although the SOLID principles apply to any object-oriented design, they can also form
 a core philosophy for methodologies such as agile development or adaptive software development.</p>
CONTENT,
             'created_at' => now(),
            ]);
    }
}
