<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;



$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$twig = Twig::create(__DIR__ . '/../templates', ['cache' => false, 'debug' => true]);
$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    
    $seo = [
        'title' => 'Shine Gupta - AI Engineer & Full-Stack Developer',
        'description' => 'AI Engineer and Full-Stack Developer with 3 years of experience building production LLM systems, with 3+ years building, fine-tuning, and deploying production ML
and LLM systems for global clients. Specialized in RAG, RLHF, SFT, LLM evaluation, and MLOps on AWS and GCP. multi-agent architectures, and customer-facing web applications.',
        'keywords' => 'AI Engineer, Full-Stack Developer, LLMs, RAG, AI Agents, LangGraph, MCP, React, Next.js, FastAPI, Python, TypeScript, MLOps, AWS, GCP, Docker, Kubernetes',
        'author' => 'Shine Gupta',
        'url' => 'https://shine-5705.github.io/',
        'image' => 'https://shine-5705.github.io/assets/images/profile.webp',
        'type' => 'profile',
        'locale' => 'en_US',
        'site_name' => 'Shine Gupta\'s Resume'
    ];
    
    $workExperience = [
        [
            'company' => 'Re-Forge',
            'url' => 'https://theadaply.com',
            'position' => 'Founder',
            'period' => '2026 - Present',
            'description' => 'Building an evolution layer for AI coding agents that learns from real engineering trajectories.',
            'details' => [
                'Re-Forge mines agent interactions, tool calls, failures, and successful resolutions to discover reusable behaviors and evaluate interventions.',
                'Continuously improves how agents perform organization-specific engineering tasks through eval-driven learning from production trajectories.'
            ],
            'tags' => ['Self Evolving Agents', 'Evals', 'Claude Code', 'Cursor', 'Codex', 'MCP']
        ],
        [
            'company' => 'Gnani.ai',
            'url' => 'https://www.gnani.ai/',
            'position' => 'Full-Stack Developer - Founder\'s Office',
            'period' => 'Apr 2026 - Present',
            'location' => 'Bengaluru, India',
            'description' => 'Sole builder in the Founder\'s Office shipping production full-stack applications for enterprise voice-agent and customer portal products.',
            'details' => [
                'Designed, built, and deployed 3 production full-stack web applications in 2 months - customer-facing portals and voice-agent products - owning frontend (React/Next.js), backend APIs, auth, and cloud deployment.',
                'Delivered directly to US and Japanese enterprise clients, iterating on their feedback to ship quickly and reliably.'
            ],
            'tags' => ['React', 'Next.js', 'FastAPI', 'AWS', 'TypeScript', 'OAuth']
        ],
        [
            'company' => 'Chatverse.io',
            'url' => 'https://chatverse.io/',
            'position' => 'Founder',
            'period' => 'Aug 2025 - April 2026',
            'description' => 'Founded and shipped Chatverse, an AI no-code automation platform that turns plain English into real actions across 15+ tools.',
            'details' => [
                'Built Chatverse, an AI no-code automation platform that turns plain English into real actions across Instagram, Gmail, Calendar, HubSpot, Notion, and 15+ tools using a custom agentic engine.',
                'Shipped the full stack (500+ active beta users, 3,500+ live automations) with React + Tailwind frontend on Firebase and backend on Google Cloud.'
            ],
            'tags' => ['React', 'LangGraph', 'FastAPI', 'AWS', 'Supabase', 'AI Agents']
        ],
        [
            'company' => 'Valura.ai',
            'url' => 'https://valura.ai/',
            'position' => 'AI Engineer (reporting to CTO)',
            'period' => 'Jan 2026 - Apr 2026',
            'location' => 'UAE (Remote)',
            'description' => 'Built production multi-agent LLM systems with guardrails, evaluation, and behavioral monitoring for enterprise deployment.',
            'details' => [
                'Designed and shipped a production multi-agent LLM architecture with guardrails, tool-use constraints, memory, and evaluation hooks for behavioral monitoring, cutting unsafe responses.',
                'Built evaluation and monitoring tooling to diagnose agent failure modes under adversarial and out-of-distribution queries; improved grounding using user history and live external data.'
            ],
            'tags' => ['LangGraph', 'LLMs', 'RAG', 'Python', 'Evals', 'Red-Teaming']
        ],
        // [
        //     'company' => 'Valura.ai',
        //     'url' => 'https://valura.ai/',
        //     'position' => 'AI Engineer Intern',
        //     'period' => 'Sep 2025 - Nov 2025',
        //     'location' => 'Bengaluru, India',
        //     'description' => 'Contributed to production AI systems and agent tooling during early-stage product development.',
        //     'details' => [
        //         'Developed LLM-powered features and internal tooling supporting multi-agent workflows and production inference pipelines.'
        //     ],
        //     'tags' => ['Python', 'LLMs', 'AI Agents', 'FastAPI']
        // ],
        [
            'company' => 'Turing',
            'url' => 'https://turing.com/',
            'position' => 'Data Scientist',
            'period' => 'Oct 2024 - Jan 2026',
            'location' => 'United States (Remote)',
            'description' => 'Data Scientist specializing in AI and machine learning solutions for software performance enhancement.',
            'details' => [
                'Led an 8-person team running RLHF and SFT fine-tuning to align LLM outputs with target behavioral specs; diagnosed reward-model failure modes and multi-turn distributional drift.',
                'Enhanced LLM-driven software performance, increasing multi-turn conversation quality by 35% using prompt engineering and response tuning.',
                'Built internal dev tools using Python, Postgres, and Neo4j for scalable evaluations and experimentation.',
                'Worked with Amazon, Servicenow, Penguin AI, Microsoft, and many more to enhance the performance of their software using LLMs.'
            ],
            'tags' => ['Transformers', 'FastAPI', 'PostgreSQL', 'Neo4j', 'Docker', 'RLHF', 'SFT', 'Fine-tuning', 'LLMs', 'AI Agents', 'Evals', 'Red-Teaming']
        ],
        [
            'company' => 'OWOW',
            'url' => 'https://owow.io/',
            'position' => 'AI Lead',
            'period' => 'Sep 2025 - Dec 2025',
            'location' => 'United States (Remote)',
            'description' => 'Led the end-to-end AI department, building and maintaining production AI systems across email automation, chatbots, and document processing.',
            'details' => [
                'Led the end-to-end AI department, building and maintaining AI email automation, chatbots, and IDP pipelines.',
                'Designed, deployed, and managed scalable AI models on AWS SageMaker, exposing them as production-ready APIs.'
            ],
            'tags' => ['AWS SageMaker', 'Python', 'FastAPI', 'IDP', 'Docker']
        ],
        [
            'company' => 'Defence Research and Development Organisation (DRDO)',
            'url' => 'https://www.drdo.gov.in/',
            'position' => 'Research Trainee',
            'period' => 'Jan 2025 - May 2025',
            'location' => 'Delhi, India',
            'description' => 'Research Trainee at India\'s premier defense research organization building domain-specific AI systems.',
            'details' => [
                'Processed 50,000+ unstructured datasets via automated web scraping and RAG pipelines to build a domain-specific AI knowledge system.',
                'Fine-tuned BERT and LLaMA for domain-specific document summarization; deployed Dockerized AI microservices with logging, monitoring, and CI/CD integration.'
            ],
            'tags' => ['Python', 'RAG', 'BERT', 'LLaMA', 'Docker', 'CI/CD']
        ],
        [
            'company' => 'Gradstem',
            'url' => 'https://www.gradstem.com/',
            'position' => 'Data Scientist',
            'period' => 'Jul 2024 - Nov 2024',
            'location' => 'United States (Remote)',
            'description' => 'Developed AI-based autonomous agents and automation solutions for business use cases.',
            'details' => [
                'Developed AI-based autonomous agents for form-filling and chatbot applications using NLP techniques.',
                'Automated the whole LInkedin , Workday, Indeed to make there process in just a click for all the jobs realted to the person profile',
                'Integrated AI solutions for business use cases, streamlining automated processes and reducing manual efforts.'
            ],
            'tags' => ['AI Agents', 'NLP', 'LLMs', 'RAG', 'MLOps']
        ],
        [
            'company' => 'Business Quant',
            'url' => 'http://businessquant.com/',
            'position' => 'Machine Learning Engineer',
            'period' => 'Jun 2023 - Sep 2024',
            'location' => 'Remote',
            'description' => 'Built NLP and OCR pipelines for automated financial data extraction.',
            'details' => [
                'Improved PaddleOCR extraction precision by 20% by fine-tuning models on currency-specific datasets.',
                'Applied custom NLP parsing algorithms on financial reports to automate metrics extraction, cutting time by 30%.'
            ],
            'tags' => ['Python', 'PaddleOCR', 'NLTK', 'NLP', 'Machine Learning']
        ]
    ];
    
    $skillCategories = [
        'Languages' => ['Python', 'TypeScript', 'JavaScript (Node.js)', 'SQL', 'C++', 'Go', 'Bash'],
        'Full-Stack & Web' => ['React', 'Next.js', 'FastAPI', 'Flask', 'REST APIs', 'OAuth / JWT', 'Internal Dashboards'],
        'Cloud, Infra & DevOps' => ['GCP', 'AWS', 'AWS SageMaker', 'Docker', 'Kubernetes', 'CI/CD (GitHub Actions)', 'IaC', 'Monitoring & Logging'],
        'Data & Databases' => ['ETL Pipelines', 'Web Scraping', 'Eval Harnesses', 'PostgreSQL', 'MySQL', 'MongoDB', 'Redis', 'Neo4j', 'Snowflake'],
        'ML & AI' => ['LLMs', 'RAG', 'AI Agents', 'LangGraph', 'MCP', 'Model Serving', 'RLHF / SFT', 'PyTorch', 'TensorFlow', 'Hugging Face', 'W&B', 'LLM Evaluation', 'Red-Teaming'],
        'AI-Assisted Coding' => ['Claude Code', 'GitHub Copilot', 'Cursor']
    ];
    
    $publications = [
        [
            'title' => 'Compute-Aware Mixture-of-Agents: Verifier-Gated Adaptive Aggregation under a Fixed Token Budget',
            'authors' => 'Shine Gupta, S Akash',
            'venue' => 'ICML 2026',
            'period' => 'May 2026',
            'status' => 'Accepted',
            'url' => 'https://openreview.net/forum?id=reVvPpjoje',
            'blogUrl' => '/blog/compute-aware-mixture-of-agents.html'
        ],
        [
            'title' => 'Who Hallucinates Tools, How Often, and What Fixes It?',
            'authors' => 'S Akash, Shine Gupta',
            'venue' => 'ICML 2026',
            'period' => 'May 2026',
            'status' => 'Accepted',
            'url' => 'https://openreview.net/forum?id=njwFtNF0OW',
            'blogUrl' => '/blog/who-hallucinates-tools.html'
        ],
        [
            'title' => 'Character-Level Language Modeling',
            'authors' => 'Gupta, S. et al.',
            'venue' => 'ICASET-2026',
            'period' => '2026',
            'status' => 'Accepted'
        ],
        [
            'title' => 'The Self-Confirmation Gap: Deployed Coding Agents Cannot Measure Their Own Improvement',
            'authors' => 'Shine Gupta, S Akash',
            'venue' => 'GlobalSouthAI Workshop, NeurIPS 2026',
            'period' => 'Sep 2026',
            'status' => 'Submitted',
            'url' => 'https://openreview.net/forum?id=Yk6n7XsIS3',
            'blogUrl' => '/blog/self-confirmation-gap.html'
        ],
        [
            'title' => 'Adaptation Without Inheritance',
            'authors' => 'S Akash, Shine Gupta',
            'venue' => 'GlobalSouthAI Workshop, NeurIPS 2026',
            'period' => 'Aug 2026',
            'status' => 'Submitted',
            'url' => 'https://openreview.net/forum?id=g5kYSKAYGu',
            'blogUrl' => '/blog/adaptation-without-inheritance.html'
        ]
    ];

    $news = [
        [
            'date' => 'Sep 2026',
            'text' => 'Submitted <a href="/blog/self-confirmation-gap.html">The Self-Confirmation Gap</a> to the GlobalSouthAI Workshop, NeurIPS 2026.'
        ],
        [
            'date' => 'Aug 2026',
            'text' => 'Submitted <a href="/blog/adaptation-without-inheritance.html">Adaptation Without Inheritance</a> to the GlobalSouthAI Workshop, NeurIPS 2026.'
        ],
        [
            'date' => 'May 2026',
            'text' => 'Two papers with <strong>S Akash</strong> accepted as posters to the SCALE Workshop @ ICML 2026: <a href="/blog/compute-aware-mixture-of-agents.html">Compute-Aware Mixture-of-Agents</a> and <a href="/blog/who-hallucinates-tools.html">Who Hallucinates Tools, How Often, and What Fixes It?</a>'
        ],
        [
            'date' => 'Apr 2026',
            'text' => 'Joined <a href="https://www.gnani.ai/" target="_blank" rel="noopener noreferrer">Gnani.ai</a> as sole full-stack builder in the Founder\'s Office, shipping 3 production apps in 2 months.'
        ],
        [
            'date' => '2026',
            'text' => 'Won the <strong>UCWS Singapore Hackathon</strong> with <em>re-forge</em>, built with co-founder S Akash.'
        ],
        [
            'date' => '2026',
            'text' => 'Building <a href="#work-experience"><em>Re-Forge</em></a>, an evolution layer for AI coding agents, with S Akash.'
        ],
        [
            'date' => '2026',
            'text' => '<em>Character-Level Language Modeling</em> accepted at ICASET-2026.'
        ]
    ];
    
    $hackathons = require __DIR__ . '/data/hackathons.php';
    
    $sideProjects = [
        [
            'name' => 'Re-Forge',
            'url' => 'https://theadaply.com',
            'description' => 'Evolution layer for AI coding agents that learns from real engineering trajectories, mining agent interactions, tool calls, failures, and successful resolutions to discover reusable behaviors and continuously improve organization-specific engineering tasks.',
            'technologies' => ['AI Agents', 'Evals', 'Claude Code', 'Cursor', 'Codex', 'MCP', 'LangGraph'],
            'active' => true
        ],
        [
            'name' => 'AI Mathematical Olympiad Solver',
            'url' => '#',
            'description' => 'Competition-level generative AI math reasoning system fine-tuning 7B LLMs (Qwen2.5-Math, NuminaMath) with QLoRA and SymPy-based symbolic verification on 50K+ problems from OpenMathReasoning.',
            'technologies' => ['Python', 'PyTorch', 'Hugging Face', 'PEFT (LoRA)', 'LLaMA-3-8B', 'QLoRA', 'SymPy'],
            'active' => true
        ],
        [
            'name' => 'Chatverse.io',
            'url' => 'https://chatverse.io/',
            'description' => 'AI no-code automation platform turning plain English into real actions across Instagram, Gmail, Calendar, HubSpot, Notion, and 15+ tools. 500+ beta users and 3,500+ live automations.',
            'technologies' => ['React', 'LangGraph', 'FastAPI', 'Firebase', 'GCP', 'AI Agents', 'Supabase'],
            'active' => true
        ],
        [
            'name' => 'CareMate',
            'url' => 'https://github.com/Shine-5705/CareMate-AI-Powered-Chronic-Disease-Monitoring-Remote-Care',
            'description' => 'Multilingual LLM-powered healthcare assistant with RAG-based clinical reasoning, symptom triage, and personalized health guidance - reducing hallucinations by 30% through contextual medical retrieval.',
            'technologies' => ['React', 'TypeScript', 'Flask', 'PostgreSQL', 'RAG', 'TensorFlow.js', 'AssemblyAI'],
            'active' => true
        ],
        [
            'name' => 'CyberRakshak',
            'url' => 'https://github.com/dorkydhruv/Cyber-Rakshak',
            'description' => 'AI-based Cybercrime Prediction System with 82% accuracy, integrating real-time risk scoring. Winner of Innotech 2023 Award',
            'Github' => 'https://github.com/dorkydhruv/Cyber-Rakshak',
            'technologies' => ['Machine Learning', 'Deep Learning', 'TensorFlow', 'Keras', 'Flask', 'Flutter', 'Firebase', 'Python'],
            'active' => true
        ],
        [
            'name' => 'AutoAttend_Gmeet',
            'url' => 'https://youtu.be/qDpPLjahspM',
            'description' => 'Developed an automation tool to auto-join Google Meet, monitor captions, detect name mentions, and sync emoji reactions in real-time using Playwright.',
            'Github' => 'https://github.com/Shine-5705/AutoAttend_Gmeet',
            'technologies' => ['Playwright', 'Deep Learning', 'Chromium', 'JSON & TXT logging for transcripts', 'FastAPI', 'Docker', 'Python'],
            'active' => true
        ],
        [
            'name' => 'CSV Summarizer & Emailer',
            'url' => 'https://csv-summarizer-emailer.onrender.com/',
            'description' => 'Built a Streamlit application to analyze CSV data, generate AI-powered summaries with Mistral, and send insights via email with PDF and CSV attachments.',
            'Github' => 'https://github.com/Shine-5705/csv-monitor-summarizer',
            'technologies' => ['Streamlit', 'Deep Learning', 'Mistral API', 'Gmail SMTP', 'FastAPI', 'Docker', 'Python','wkhtmltopdf','Render'],
            'active' => true
        ],
        [
            'name' => 'India Art, Culture & Tourism Dashboard',
            'url' => 'https://youtu.be/qDpPLjahspM',
            'description' => 'Developed a data-driven Streamlit dashboard with Snowflake integration to showcase India’s cultural heritage, analyze tourism patterns, and promote responsible tourism through interactive visualizations.',
            'Github' => 'https://github.com/Shine-5705/bharat-culture-tourism-analytics',
            'technologies' => ['Streamlit', 'Machine Learning', 'PyDeck', 'Snowflake', 'Government tourism & culture datasets', 'Docker', 'Python', 'Git', 'FastAPI'],
            'active' => true
        ],
        [
            'name' => 'LinkedIn Auto Connect Agent',
            'url' => 'https://github.com/Shine-5705/Connect_over_LinkedIN',
            'description' => 'Built a Selenium-powered LinkedIn automation agent with a Streamlit interface to search, filter, and auto-connect with professionals while securely managing credentials and logging interactions.',
            'Github' => 'https://github.com/Shine-5705/Connect_over_LinkedIN',
            'technologies' => ['Streamlit', 'Machine Learning', 'Selenium', 'Docker', 'Python', 'GitHub', 'FastAPI'],
            'active' => true
        ],
        [
            'name' => 'Real Time Violence Detection',
            'url' => 'https://github.com/Shine-5705/Real-Time-Violence-Detection',
            'description' => 'Developed a real-time violence detection system using a Vision Transformer (ViViT) model integrated with Twilio to trigger automated calls and SMS alerts when violence is detected through a live camera feed.',
            'Github' => 'https://github.com/Shine-5705/Real-Time-Violence-Detection',
            'technologies' => ['ViViT', 'OpenCV', 'TensorFlow', 'Docker', 'Python', 'GitHub', 'Twilio API'],
            'active' => true
        ]               
        
           
    ];
    
    $education = [
        [
            'institution' => 'KIET Group of Institutions',
            'period' => 'November 2022 - June 2026',
            'degree' => 'Bachelor of Technology in Information Technology (GPA: 9)'
        ],
        [
            'institution' => 'CJ DAV Centenary School (CBSE)',
            'period' => 'April 2021 - July 2022',
            'degree' => 'Senior Secondary (95.8%)'
        ]
    ];
    
    $data = [
        'seo' => $seo,
        'profile' => [
            'name' => 'Shine Gupta',
            'description' => 'Founder, Re-Forge · Full-Stack Developer, Gnani.ai · AI Engineer & Researcher.',
            'location' => 'Bengaluru, India',
            'about' => 'I\'m building Re-Forge, an evolution layer for AI coding agents that turns real engineering trajectories into agent improvements, and working full-stack in Gnani.ai\'s Founder\'s Office, where I\'ve shipped 3 production LLM and voice-agent applications in 2 months. My research looks at where self-improving agents actually break: tool hallucination, agents grading their own logs, and what a system learns versus what it\'s told. Two papers are accepted at the ICML 2026 SCALE Workshop, and two more are under review for the NeurIPS 2026 GlobalSouthAI Workshop. Before this, I founded Chatverse.io, built agent evaluation systems at Valura.ai, and won 9+ hackathons including UCWS Singapore.'
        ],
        'workExperience' => $workExperience,
        'skillCategories' => $skillCategories,
        'publications' => $publications,
        'sideProjects' => $sideProjects,
        'education' => $education,
        'news' => $news
    ];

    return $view->render($response, 'index.twig', $data);
});

$app->get('/hackathons', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);

    $hackathons = require __DIR__ . '/data/hackathons.php';

    $seo = [
        'title' => 'Hackathons - Shine Gupta',
        'description' => '9+ hackathon wins, including UCWS Singapore, Meesho ScriptedByHer, and the 5G & Beyond Hackathon.',
        'keywords' => 'Hackathons, UCWS Singapore, Meesho, Amazon ML Challenge, AI Agents',
        'author' => 'Shine Gupta',
        'url' => 'https://shine-5705.github.io/hackathons',
        'image' => 'https://shine-5705.github.io/assets/images/profile.webp',
        'type' => 'website',
        'locale' => 'en_US',
        'site_name' => 'Shine Gupta\'s Resume'
    ];

    return $view->render($response, 'hackathons.twig', [
        'seo' => $seo,
        'hackathons' => $hackathons
    ]);
});

$app->get('/{path:.*}', function ($request, $response, $args) {
    return $response->withHeader('Location', '/')->withStatus(302);
});

$app->run();
