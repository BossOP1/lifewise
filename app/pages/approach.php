<?php
/** @var array $media */
$process = [
    ['A first conversation', 'A complimentary 15-minute consultation gives us a chance to understand what you need, answer questions, and explore provider and payment options.'],
    ['Get to know your story', 'The intake session is a space to clarify your concerns and goals, understand your experiences, and begin building a working relationship.'],
    ['Look beneath the surface', 'Assessments help your provider understand symptoms, patterns, strengths, and areas that may need support.'],
    ['Build a plan together', 'You and your provider decide on treatment goals, areas of focus, and practical ways to track what is changing.'],
    ['Notice what is working', 'Ongoing sessions make room to review progress, explore barriers, and adjust the work around your needs.'],
    ['Carry the work forward', 'As goals are met, you can review what you have learned and plan for maintaining the changes that matter to you.'],
];
$principles = [
    ['Safety & trust', 'We make room to understand your experiences without reducing your story to a diagnosis or a problem to be fixed.'],
    ['Choice & collaboration', 'Your goals help shape the work. We build a plan together and keep talking about what feels useful and manageable.'],
    ['Context & understanding', 'We consider how your history, relationships, environment, and ways of coping may shape what you are experiencing now.'],
];
?>
<div class="experience-page">
  <?php partial('experience-hero', ['eyebrow' => 'OUR APPROACH', 'title' => 'Care built around', 'accent' => 'the person.', 'description' => 'You’re a person with a story, strengths, and goals. Our work begins with understanding you and building a relationship where you feel safe, respected, and heard.', 'image' => $media['approach-hero']]); ?>
  <section class="page-section experience-introduction"><div><p class="eyebrow">COME AS YOU ARE</p><h2>You don’t need<br /><em>the perfect words.</em></h2></div><div><p>Life can ask a lot of you. You don’t have to have everything figured out before reaching out. We’ll get to know what matters to you and help you find support that feels right, at a pace that works for you.</p><p>Our providers bring different backgrounds, personalities, and approaches. We consider your needs, preferences, and goals when helping you find a provider. If another type of care would better meet your needs, we’ll discuss that openly.</p><a class="page-text-link" href="/services/">Explore our services ↗</a></div></section>
  <section class="page-section experience-principles"><div class="page-section-heading"><div><p class="eyebrow">GROUNDED IN HUMAN CARE</p><h2>Your experience.<br /><em>Your voice. Your pace.</em></h2></div><p>Our trauma-informed approach centers safety, trust, choice, and collaboration.</p></div><?php partial('numbered-grid', ['items' => $principles, 'class' => 'experience-principle-grid']); ?></section>
  <section class="page-section experience-human"><figure><img src="<?= e($media['hero-consultation']['src']) ?>" alt="<?= e($media['hero-consultation']['alt']) ?>" loading="lazy" /></figure><div><p class="eyebrow">THE RELATIONSHIP MATTERS</p><h2>Professional care.<br /><em>A human connection.</em></h2><p>The fit between you and your counselor matters. We speak in clear, comfortable language, take your goals seriously, and make space for the complicated parts of being human.</p><p>You can begin with what is happening now. You don’t have to describe every difficult experience before you’re ready.</p><a class="page-text-link" href="/careteam/">Get to know your care team ↗</a></div></section>
  <section class="page-section page-section--sage"><div class="page-section-heading"><div><p class="eyebrow">HOW THE WORK UNFOLDS</p><h2>A thoughtful process.<br /><em>Built together.</em></h2></div><p>Counseling stays focused on your goals, with room to review and adjust along the way.</p></div><?php partial('numbered-grid', ['items' => $process, 'class' => 'experience-process']); ?><a class="page-text-link experience-process-link" href="/2026/05/28/this-is-how-we-do-it-therapeutic-process-at-lifewise/">Read more about our therapeutic process ↗</a></section>
  <?php partial('closing', ['title' => 'A conversation is a place to begin.', 'text' => 'Bring your questions, your uncertainty, and whatever words you have. We’ll help you explore the next step.']); ?>
</div>
