<?php
declare(strict_types=1);

/** @var array $content */
/** @var array $media */

const CONSULTATION = '/consultation/';
const BOOKING_URL = 'https://calendar.app.google/nyiYDRBgML4yuVa39';
const PROFESSIONAL_MAIL = 'mailto:lifewise@lifewisetx.com?subject=Professional%20inquiry';

$team = [
    ['name' => 'Stacy Hixon', 'role' => 'Clinical Director', 'image' => '/images/team-stacy.png', 'href' => '/stacy/'],
    ['name' => 'Martha Sharpe', 'role' => 'LPC Associate', 'image' => '/images/team-martha.png', 'href' => '/martha-sharpe/'],
    ['name' => 'Caity Boyd', 'role' => 'Graduate Counseling Intern', 'image' => '/images/team-caity.png', 'href' => '/caity-boyd/'],
    ['name' => 'Hazel Dettmer', 'role' => 'Group Facilitator', 'image' => '/images/team-hazel.png', 'href' => '/hazel-dettmer/'],
];

$areas = [
    [
        'num' => '01', 'href' => '/anxiety-and-depression/', 'title' => 'Individual Counseling & Anxiety',
        'desc' => 'Support for anxiety, panic, depression, burnout, chronic stress, and navigating high-pressure life transitions.',
        'media' => 'home-anxiety', 'badge' => 'Virtual & In-Person',
        'tags' => ['Panic & Worry', 'Burnout Recovery', 'Somatic Soothing', 'Life Transitions'],
    ],
    [
        'num' => '02', 'href' => '/neurodivergence/', 'title' => 'Neurodivergent & Affirming Care',
        'desc' => 'Respectful, neurodiversity-affirming counseling for ADHDers, autistic adults, late-diagnosed individuals, and LGBTQIA+ clients.',
        'media' => 'home-neurodivergence', 'badge' => 'Affirming & Unmasking',
        'tags' => ['ADHD & Autism', 'Late Diagnosis', 'Unmasking Safely', 'Sensory Grounding'],
    ],
    [
        'num' => '03', 'href' => '/trauma/', 'title' => 'Trauma & EMDR Processing',
        'desc' => 'Somatic, grounded support to process deep emotional wounds, PTSD, relational trauma, and rebuild a sense of safety.',
        'media' => 'home-trauma', 'badge' => 'Somatic & EMDR',
        'tags' => ['PTSD & Flashbacks', 'Relational Wounds', 'EMDR Processing', 'Nervous System Safety'],
    ],
    [
        'num' => '04', 'href' => '/relationships/', 'title' => 'Couples & Relationship Health',
        'desc' => 'Make room for clearer communication, de-escalating recurring conflict, and cultivating authentic emotional intimacy.',
        'media' => 'home-relationships', 'badge' => 'Couples & Families',
        'tags' => ['Conflict De-escalation', 'Emotional Intimacy', 'Communication Habits', 'Secure Attachment'],
    ],
];

$homeReflections = [
    [
        'title' => 'Why Counselors Need Therapy Too', 'date' => 'OCTOBER 2026', 'readTime' => '4 MIN READ',
        'author' => 'Clinical Practice Note', 'category' => 'COUNSELOR WELLNESS',
        'desc' => 'The importance of secondary trauma awareness, emotional sustainability, and walking the walk as helping professionals.',
        'image' => '/images/reflection-counseling.jpeg', 'href' => '/2026/10/01/why-counselors-need-therapy-too/',
    ],
    [
        'title' => 'We Create Our Identity', 'date' => 'SEPTEMBER 2026', 'readTime' => '5 MIN READ',
        'author' => 'Identity & Boundaries', 'category' => 'IDENTITY & BOUNDARIES',
        'desc' => 'Navigating family roles, establishing healthy boundaries, and shedding old narratives to build a grounded sense of self.',
        'image' => '/images/reflection-identity.jpeg', 'href' => '/2026/09/24/we-created-our-identity/',
    ],
    [
        'title' => 'Sitting With Discomfort & Mindfulness', 'date' => 'SEPTEMBER 2026', 'readTime' => '6 MIN READ',
        'author' => 'Somatic Regulation', 'category' => 'EMOTIONAL REGULATION',
        'desc' => 'Understanding how somatic mindfulness and nervous system soothing help us weather life’s harder emotional seasons.',
        'image' => '/images/reflection-mindfulness.jpeg', 'href' => '/2026/09/17/wet-socks-sitting-with-discomfort/',
    ],
];

$providers = [
    ['path' => '/stacy/', 'name' => 'Stacy Hixon', 'credentials' => 'MA, LPC-S, CCTP, FRTP', 'role' => 'Clinical Director', 'pronouns' => 'she/her', 'format' => 'In North Fort Worth & online across Texas', 'image' => '/images/team-stacy.png', 'note' => 'Trauma-informed care, grounded in your lived experience.', 'tags' => ['Trauma & PTSD', 'First responders', 'Adults & couples']],
    ['path' => '/martha-sharpe/', 'name' => 'Martha Sharpe', 'credentials' => 'LPC Associate', 'role' => 'Licensed Professional Counselor Associate', 'pronouns' => 'she/her', 'format' => 'Online across Texas · Limited in-person in Montgomery', 'image' => '/images/team-martha.png', 'note' => 'A compassionate space to slow down and reconnect with yourself.', 'tags' => ['Mindfulness', 'Somatic approaches', 'Self-trust'], 'supervised' => true],
    ['path' => '/caity-boyd/', 'name' => 'Caity Boyd', 'credentials' => 'BS · Graduate Counseling Intern', 'role' => 'Graduate Counseling Intern', 'pronouns' => 'she/her', 'format' => 'Online across Texas', 'image' => '/images/team-caity.png', 'note' => 'Collaborative support for resilience, awareness, and growth.', 'tags' => ['Resilience', 'Adults & couples', 'Self-pay care'], 'supervised' => true],
    ['path' => '/hazel-dettmer/', 'name' => 'Hazel Dettmer', 'credentials' => 'BSW', 'role' => 'Group Facilitator', 'pronouns' => 'she/her', 'format' => 'LGBTQIA+ support group facilitation', 'image' => '/images/team-hazel.png', 'note' => 'An affirming space for connection, shared experience, and belonging.', 'tags' => ['Group support', 'LGBTQIA+ affirming', 'Connection']],
    ['path' => '/lynn/', 'name' => 'Lynn Hixon III', 'credentials' => 'MA', 'role' => 'Director of Operations', 'pronouns' => 'he/him', 'format' => 'Practice operations · Nonclinical role', 'image' => $content['/lynn/']['image'], 'note' => 'Supporting the people and systems that make thoughtful care possible.', 'tags' => ['Navy veteran', 'Leadership', 'Practice support']],
];

$service = fn (string $path, string $title, string $key, string $label, string $desc, array $extra = []) => [
    'path' => $path, 'title' => $title,
    'image' => $media["card-$key"]['src'], 'imageAlt' => $media["card-$key"]['alt'],
    'hero' => $media["hero-$key"], 'label' => $label, 'desc' => $desc,
] + $extra;

$services = [
    $service('/anxiety-and-depression/', 'Anxiety & depression', 'anxiety', 'A little room to breathe', 'Understand what feels overwhelming, reconnect with yourself, and find a way forward.'),
    $service('/neurodivergence/', 'Neurodivergent care', 'neurodivergence', 'Care that works with your brain', 'Explore ADHD, masking, sensory needs, executive functioning, and your own ways of being.'),
    $service('/trauma/', 'Trauma & recovery', 'trauma', 'Safety at your own pace', 'Make sense of survival patterns and build more room for trust, connection, and choice.'),
    $service('/relationships/', 'Relationships & connection', 'relationships', 'Find your way back to each other', 'Support for individuals, couples, and families navigating communication, conflict, and trust.'),
    $service('/stress/', 'Stress & burnout', 'stress', 'Make room for recovery', 'Explore ongoing pressure, protect your energy, and develop more sustainable boundaries.'),
    $service('/life-challenges/', 'Life changes & loss', 'life-challenges', 'A place for the next chapter', 'Space to process grief, transitions, uncertainty, identity shifts, and difficult decisions.', ['detailImage' => $media['home-intro']]),
    $service('/lgbtq-affirmative-support/', 'LGBTQIA+ affirming support', 'lgbtq', 'Show up as yourself', 'Welcoming care that sees the whole person and follows what matters to you.'),
];
unset($service);

$serviceHeadlines = [
    '/anxiety-and-depression/' => ['A little room', 'to breathe.'],
    '/neurodivergence/' => ['Care that works', 'with your brain.'],
    '/trauma/' => ['Your story. Your pace.', 'A way forward.'],
    '/relationships/' => ['Make room for', 'connection.'],
    '/stress/' => ['You can pause.', 'You can exhale.'],
    '/life-challenges/' => ['When life changes,', 'find your footing.'],
    '/lgbtq-affirmative-support/' => ['All of you', 'is welcome here.'],
];

$legalPaths = ['/client-rights/', '/good-faith-estimate/', '/website-privacy-policy/', '/terms-of-use/', '/client-information-and-website-disclosures/'];
$resourceLinks = [
    ['/pricing/', 'Insurance & pricing'], ['/frequently-asked-questions/', 'Frequently asked questions'],
    ['/client-rights/', 'Client rights'], ['/good-faith-estimate/', 'Good Faith Estimate'],
    ['/client-information-and-website-disclosures/', 'Credentials & disclosures'],
    ['/website-privacy-policy/', 'Website privacy'], ['/terms-of-use/', 'Terms of use'],
];

$rates = [
    ['title' => 'Licensed Professional Counselor', 'subtitle' => 'Independently licensed clinical care', 'name' => 'Stacy Hixon', 'individual' => 165, 'couples' => 185, 'path' => '/stacy/', 'label' => 'LPC'],
    ['title' => 'LPC Associate', 'subtitle' => 'Licensed care under clinical supervision', 'name' => 'Martha Sharpe', 'individual' => 135, 'couples' => 155, 'path' => '/martha-sharpe/', 'label' => 'LPC ASSOCIATE'],
    ['title' => 'Graduate Counseling Intern', 'subtitle' => 'Graduate-level care with close supervision', 'name' => 'Caity Boyd', 'individual' => 70, 'couples' => 85, 'path' => '/caity-boyd/', 'label' => 'COUNSELING INTERN'],
];

$insurers = ['Aetna', 'Aetna Medicare Advantage', 'Anthem EAP (Standard & Expanded)', 'Ascension Smart Health', 'Blue Cross / Blue Shield (MA & TX)', 'Carelon', 'Cigna', 'Curative', 'Devoted Health Medicare Advantage', 'Horizon Blue Cross / Blue Shield (NJ)', 'Humana Medicare Advantage', 'Optum (Oscar, Oxford & United Health Care)', 'Providence Health Plan (Medicare Advantage)', 'TRICARE', 'TriWest'];

$articles = [];
foreach ($content as $articlePath => $articlePage) {
    if (!empty($articlePage['article'])) $articles[] = $articlePage + ['path' => $articlePath];
}
unset($articlePath, $articlePage);

/** Lookup helper: first item in $list whose $key equals $value. */
function find_by(array $list, string $key, string $value): ?array
{
    foreach ($list as $item) if (($item[$key] ?? null) === $value) return $item;
    return null;
}

/** Service page FAQs: three service-specific questions, then the shared practical ones. */
$serviceFaqShared = [
    ['Do you offer online and in-person sessions?', 'Yes. LifeWise offers secure telehealth sessions throughout Texas, and in-person counseling in select locations, including North Fort Worth.'],
    ['How do I get started?', 'Book a complimentary 15-minute consultation. We’ll talk briefly about what you’re looking for and help you find the member of our care team who may be the best fit.'],
];
$serviceFaqs = [
    '/anxiety-and-depression/' => [
        ['What if I’m not sure whether it’s anxiety or depression?', 'You don’t need a label to begin. You may simply know that you don’t feel like yourself anymore, and that is enough. Counseling can help you understand what’s happening beneath the symptoms.'],
        ['What does counseling for anxiety and depression look like?', 'Together we look at the triggers and patterns behind how you feel, build practical ways to manage stress and overwhelm, and explore the thoughts and habits that may no longer be helping.'],
        ['Anxiety doesn’t always look like panic for me. Can you still help?', 'Yes. Anxiety can look like functioning well on the outside while your mind and body stay on alert, and depression can look like exhaustion or numbness rather than sadness. All of that is welcome here.'],
    ],
    '/neurodivergence/' => [
        ['Do I need a formal diagnosis to get support?', 'No. Whether you have a diagnosis, are exploring one, or are simply curious about how your brain works, you are welcome to begin.'],
        ['Will counseling try to change how my brain works?', 'No. Our approach is affirming. Rather than asking you to fit a mold, we work with your brain to find strategies and ways of living that suit you.'],
        ['What kinds of things can we work on?', 'Common topics include ADHD, masking and unmasking, sensory needs, executive functioning, burnout, and understanding your own ways of being.'],
    ],
    '/trauma/' => [
        ['Do I have to talk about my trauma in detail?', 'No. Counseling does not require you to relive or describe traumatic experiences before you are ready. We can focus on stabilization, regulation, coping skills, patterns, and current concerns.'],
        ['What if I’m not sure what I went through “counts” as trauma?', 'You don’t need to prove anything to begin. If something still affects how you feel, react, or connect with others, it deserves care and attention.'],
        ['Do you work with first responders and veterans?', 'Yes. We provide trauma-informed counseling for first responders, veterans, military members, dispatchers, and their families.'],
    ],
    '/relationships/' => [
        ['Can I come to counseling on my own?', 'Yes. Many people work on relationship patterns individually. We also offer couples and family counseling when everyone would like to take part.'],
        ['What if my partner isn’t sure about counseling?', 'That’s common. You can start on your own, and a complimentary consultation can help you both understand what sessions might look like before deciding.'],
        ['Is this only for romantic relationships?', 'No. We support individuals, couples, and families with communication, conflict, trust, and connection in all kinds of relationships.'],
    ],
    '/stress/' => [
        ['How do I know if it’s stress or burnout?', 'Stress often feels like too much at once. Burnout can feel like running on empty: exhaustion, detachment, and feeling less effective. You don’t need to know which it is to reach out.'],
        ['Can counseling help if I can’t change my job or responsibilities?', 'Yes. Counseling can help you protect your energy, set more sustainable boundaries, and find small changes that make a real difference, even when the bigger picture stays the same.'],
        ['I don’t have much time. Is counseling realistic for me?', 'Online sessions across Texas can make care easier to fit into a full schedule. Most sessions are about 50 to 60 minutes.'],
    ],
    '/life-challenges/' => [
        ['Does it have to be a big life change to seek support?', 'No. Any change that leaves you feeling uncertain, unsettled, or unlike yourself is worth talking about, big or small.'],
        ['Is there a right time to start counseling after a loss?', 'There is no right or wrong time. Some people reach out right away, others months or years later. Grief moves at its own pace, and so can counseling.'],
        ['What if I don’t know what I want next?', 'That’s okay. Counseling can be a place to sit with uncertainty, explore your options, and make difficult decisions with more clarity.'],
    ],
    '/lgbtq-affirmative-support/' => [
        ['Do I need to be out to get support?', 'No. Wherever you are in your journey, you are welcome here, and you decide what you share and when.'],
        ['Will counseling focus only on my identity?', 'Only if you want it to. Affirming care sees the whole person and follows what matters to you, whether that’s identity, relationships, anxiety, or anything else.'],
        ['Do you offer group support?', 'Yes. LifeWise offers an LGBTQIA+ support group, an affirming space for connection, shared experience, and belonging.'],
    ],
];
