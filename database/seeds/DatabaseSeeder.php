<?php

use Illuminate\Database\Seeder;
use App\Models\Concept;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concepts = [

            'Databases','A database is an organized collection of data. It is the collection of schemas, tables, queries, reports, views, and other objects. The data are typically organized to model aspects of reality in a way that supports processes requiring information, such as modelling the availability of rooms in hotels in a way that supports finding a hotel with vacancies.','An organized collection of data',

            'SQL','SQL is a special-purpose domain-specific language used in programming and designed for managing data held in a relational database management system (RDBMS), or for stream processing in a relational data stream management system (RDSMS).','Structured Query Language',

            'ER Model','An entity–relationship model (ER model) describes inter-related things of interest in a specific domain of knowledge. An ER model is composed of entity types (which classify the things of interest) and specifies relationships that can exist between instances of those entity types.','Describes inter-related things of interest in a specific domain of knowledge',

            'Database Normalization','Database normalization, or simply normalization, is the process of organizing the columns (attributes) and tables (relations) of a relational database to reduce data redundancy and improve data integrity.
            Normalization involves arranging attributes in tables based on dependencies between attributes, ensuring that the dependencies are properly enforced by database integrity constraints. Normalization is accomplished through applying some formal rules either by a process of synthesis or decomposition. Synthesis creates a normalized database design based on a known set of dependencies. Decomposition takes an existing (insufficiently normalized) database design and improves it based on the known set of dependencies.','Organizing the columns and tables of a relational database to reduce data redundancy',

            'Data Structures','In computer science, a data structure is a particular way of organizing data in a computer so that it can be used efficiently. Data structures can implement one or more particular abstract data types (ADT), which specify the operations that can be performed on a data structure and the computational complexity of those operations. In comparison, a data structure is a concrete implementation of the specification provided by an ADT.
            Different kinds of data structures are suited to different kinds of applications, and some are highly specialized to specific tasks. For example, relational databases commonly use B-tree indexes for data retrieval, while compiler implementations usually use hash tables to look up identifiers.','A particular way of organizing data',

            'Hash Tables','In computing, a hash table (hash map) is a data structure used to implement an associative array, a structure that can map keys to values. A hash table uses a hash function to compute an index into an array of buckets or slots, from which the desired value can be found.
            Ideally, the hash function will assign each key to a unique bucket, but most hash table designs employ an imperfect hash function, which might cause hash collisions where the hash function generates the same index for more than one key. Such collisions must be accommodated in some way.',' hash table is a data structure used to implement an associative array',

            'Conceptual Model','A conceptual model is a representation of a system, made of the composition of concepts which are used to help people know, understand, or simulate a subject the model represents. Some models are physical objects; for example, a toy model which may be assembled, and may be made to work like the object it represents. The term conceptual model may be used to refer to models which are formed after a conceptualization or generalization process. Conceptual models are often abstractions of things in the real world whether physical or social. Semantics studies are relevant to various stages of concept formation and use as Semantics is basically about concepts, the meaning that thinking beings give to various elements of their experience.','A representation of a system, made of the composition of concepts',

            'Arrays','Generally, a collection of data items that can be selected by indices computed at run-time','An array is a systematic arrangement of similar objects',

            'B-Tree','In computer science, a B-tree is a self-balancing tree data structure that keeps data sorted and allows searches, sequential access, insertions, and deletions in logarithmic time. The B-tree is a generalization of a binary search tree in that a node can have more than two children. Unlike self-balancing binary search trees, the B-tree is optimized for systems that read and write large blocks of data. B-trees are a good example of a data structure for external memory. It is commonly used in databases and filesystems.','A self-balancing tree data structure',

            'Computer Graphics Transformation','Transformation means changing some graphics into something else by applying rules. We can have various types of transformations such as translation, scaling up or down, rotation, shearing, etc. When a transformation takes place on a 2D plane, it is called 2D transformation. Transformations play an important role in computer graphics to reposition the graphics on the screen and change their size or orientation.','changing some graphics into something else by applying rules',

            'Transformation matrix','Matrices allow arbitrary linear transformations to be represented in a consistent format, suitable for computation. This also allows transformations to be concatenated easily (by multiplying their matrices).','In linear algebra, linear transformations can be represented by matrices',

            'Linear Algebra','Linear algebra is the branch of mathematics concerning vector spaces and linear mappings between such spaces. It includes the study of lines, planes, and subspaces, but is also concerned with properties common to all vector spaces.
            The set of points with coordinates that satisfy a linear equation forms a hyperplane in an n-dimensional space. The conditions under which a set of n hyperplanes intersect in a single point is an important focus of study in linear algebra. Such an investigation is initially motivated by a system of linear equations containing several unknowns. Such equations are naturally represented using the formalism of matrices and vectors.','The branch of mathematics concerning vector spaces and linear mappings between such spaces',


            'Algebra','Algebra is one of the broad parts of mathematics, together with number theory, geometry and analysis. In its most general form, algebra is the study of mathematical symbols and the rules for manipulating these symbols; it is a unifying thread of almost all of mathematics. As such, it includes everything from elementary equation solving to the study of abstractions such as groups, rings, and fields. The more basic parts of algebra are called elementary algebra, the more abstract parts are called abstract algebra or modern algebra. Elementary algebra is generally considered to be essential for any study of mathematics, science, or engineering, as well as such applications as medicine and economics. Abstract algebra is a major area in advanced mathematics, studied primarily by professional mathematicians. Much early work in algebra, as the Arabic origin of its name suggests, was done in the Middle East, by Persian mathematicians such as al-Khwārizmī (780–850) and Omar Khayyam','one of the broad parts of mathematics, together with number theory, geometry and analysis',

            'Trigonometry','Trigonometry is a branch of mathematics that studies relationships involving lengths and angles of triangles. The field emerged in the Hellenistic world during the 3rd century BC from applications of geometry to astronomical studies.
            The 3rd-century astronomers first noted that the lengths of the sides of a right-angle triangle and the angles between those sides have fixed relationships: that is, if at least the length of one side and the value of one angle is known, then all other angles and lengths can be determined algorithmically. These calculations soon came to be defined as the trigonometric functions and today are pervasive in both pure and applied mathematics: fundamental methods of analysis such as the Fourier transform, for example, or the wave equation, use trigonometric functions to understand cyclical phenomena across many applications in fields as diverse as physics, mechanical and electrical engineering, music and acoustics, astronomy, ecology, and biology. Trigonometry is also the foundation of surveying.','A branch of mathematics that studies relationships involving lengths and angles of triangles',

            'Vectors','In mathematics, physics, and engineering, a Euclidean vector (sometimes called a geometric or spatial vector, or—as here—simply a vector) is a geometric object that has magnitude (or length) and direction. Vectors can be added to other vectors according to vector algebra. A Euclidean vector is frequently represented by a line segment with a definite direction, or graphically as an arrow, connecting an initial point A with a terminal point B, and denoted by AB.','A geometric object that has magnitude (or length) and direction',

            'Addition','1 + 1 = 2 ',' 1 + 3 = 4',

            'Subtraction','2 - 1 = 1','6 - 1 = 5',

            'Division','2 * 2 = 4','5 * 5 = 25'

            ];

            $relations = [
                1,2,
                1,3,
                1,4,
                2,6,
                3,7,
                1,5,
                5,6,
                5,8,
                5,9,
                10,11,
                11,12,
                12,13,
                12,14,
                12,15,
                15,13,
                13,16,
                13,17,
                13,18,
            ];
        for ($i = 0; $i < sizeof($concepts); $i += 3)
        {
            $concept = Concept::create([
                'name' => $concepts[$i],
                'body' =>  $concepts[$i+1],
                'description' => $concepts[$i+2],
                'status' => "primary"
            ]);
        }
        for ($i = 0; $i < sizeof($relations); $i += 2)
        {
            DB::table('concept_concept')->insert([
                'child_concept_id' => $relations[$i],
                'parent_concept_id' => $relations[$i + 1]
            ]);
        }
        DB::table('processes')->insert([
            'id' => 1,
            'concept_id' => 4,
            'name' => 'First normal form normalization',
            'description' => 'A relation is in first normal form if and only if the domain of each attribute contains only atomic (indivisible) values, and the value of each attribute contains only a single value from that domain.'
        ]);
        DB::table('process_steps')->insert([
            'id' => 1,
            'name' => 'Eliminate tuples',
            'description' => 'Eliminate repeating tuples in individual tables.',
            'process_id' => 1,
            'step' => 1
        ]);
        DB::table('process_steps')->insert([
            'id' => 2,
            'name' => 'Create tables',
            'description' => 'Create a separate table for each set of related data.',
            'process_id' => 1,
            'step' => 2
        ]);
        DB::table('process_steps')->insert([
            'id' => 3,
            'name' => 'Identify data',
            'description' => 'Identify each set of related data with a primary key.',
            'process_id' => 1,
            'step' => 3
        ]);

        DB::table('users')->insert([
            'id'=> 1,
            'name' => 'admin',
            'email' => 'justinhoyt24@gmail.com',
            'password' => bcrypt('VeryPassword1!'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'id'=> 2,
            'name' => 'admin',
            'email' => 'drewseph94@yahoo.com',
            'password' => bcrypt('VeryPassword1!'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'id'=> 3,
            'name' => 'admin',
            'email' => 'ktcser@umich.edu',
            'password' => bcrypt('VeryPassword1!'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'id'=> 4,
            'name' => 'admin',
            'email' => 'gregnkaiser@gmail.com',
            'password' => bcrypt('VeryPassword1!'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'id'=> 5,
            'name' => 'admin',
            'email' => 'jvachere@umich.edu',
            'password' => bcrypt('VeryPassword1!'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'id'=> 6,
            'name' => 'admin',
            'email' => 'gorancfg@gmail.com',
            'password' => bcrypt('VeryPassword1!'),
            'is_admin' => true
        ]);

    }
}
