# symfony + vue + postgres ddb demo

A demo project that uses ddb to show how easy it is to setup an environment

## Installation

### Clone the project

```bash
git clone https://github.com/inetum-orleans/ddb-symfony-vue-demo.git
```

### In your devbox, in the project directory

```bash
ddb configure
```

The first time, you will need to activate the project thanks to smartcd

```bash
cd .
```

### Initialize the project

```bash
make init
```

This will build and run the docker containers, setup the database and install the dependencies.

### Start the frontend project

```bash
make watch
```

That's it, your app is up and running on https://ddb-symfony-vue-demo.test