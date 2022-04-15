# undefined

## Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Usage](#usage)
- [Creating a Page] (#creating)
## About <a name = "about"></a>

Write about 1-2 paragraphs describing the purpose of your project.

## Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See [deployment](#deployment) for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them.

```

```

### Installing

A step by step series of examples that tell you how to get a development env running.

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo.

## Usage <a name = "usage"></a>

Add notes about how to use the system.

## Creating a Page <a name = "creating"></a>

In order to create a new page in the system, you will need to know a few things since we are using twig templates:

1. Your HTML should be located in the views page.
2. In the root directory should be the php page which inculdes the header, rendering, variables passed to the templates, and the footer.
2. The header will include opening tage for the `<body>` and `<main>` tags. Do not include these in your HTML.
3. For information on twig templating see: https://twig.symfony.com/doc/2.x/templates.html
4. See '!teplate' pages in views and the root directory for specific implementation information.