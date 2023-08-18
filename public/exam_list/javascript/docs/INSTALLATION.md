# Installation

This track relies on [Node.js][web-nodejs] throughout to provide a runtime for JavaScript.
This means that we assume all execution of JavaScript on your computer will happen using [Node.js][web-nodejs].

## Track Requirements

Many machines come pre-installed with [Node.js][web-nodejs] or might have been installed previously, or as a dependency.
So before we do anything, we should check if it's already installed:

1. Open up a _terminal_ (`Terminal`, `cmd`, `Powershell`, `bash`, ...)
1. `node -v`

If [Node.js][web-nodejs] is installed, a version is displayed.
Write this version down.
If [Node.js][web-nodejs] is _not_ installed, an error will be written out.
Usually, something along the lines of `'node' is not recognised`.

## Node.js

### If Node.js is pre-installed

Browse to [the Node.js website][web-nodejs].
It will display _two_ versions (if it detects your OS. Otherwise, select your OS first).
If your `node -v` version matches one of these, you're good.
If it doesn't, we recommend that you use Node.js LTS.
If you're worried upgrading might break something on your system, you can continue as if everything is fine;
we might not be able to provide support when something unexpected happens.

### If Node.js is not installed

There are a couple of ways to install [Node.js][web-nodejs]:

- via an [Installer or Binary][web-nodejs-download]
- via a [package manager][web-nodejs-package]

Both options support Windows, macOS, and Linux. If you don't know what to do, using an installer is the easiest.

- We recommend using the **LTS** version. This is also indicated as _recommended_ on the [Node.js][web-nodejs] website "for most users".
- Follow the instructions on the webpage and/or during the installer and install [Node.js][web-nodejs].

## Testing the installation

After the installer is done, or the package manager has completed, or the binary has been copied and the instructions have been followed, it's good to test if everything is alright.

1. Open up a _terminal_ (`Terminal`, `cmd`, `Powershell`, `bash`, ...)
1. `node -v`

The version should match the one on the website.

**Note**: It is important to open a _new_ terminal window.
Any open terminal windows might not have been refreshed after the installation completed.
This means that the open terminals don't know that a new program was installed.

> _**Help**_: `'node' is not recognised`
>
> If you've used the official installer, your `PATH` should have been automatically configured, but if your shell has trouble locating your globally installed modules &mdash; or if you build Node.js from source &mdash; update your `PATH` to include the `npm` binaries.
>
> On macOS and Linux you may accomplish this by adding the following to either `~/.bash_profile` or `~/.zshrc`:
>
> ```shell
> export PATH=/usr/local/share/npm/bin:$PATH
> ```
>
> On Windows open the start menu and search for "environment variables".
> You'll need to edit the `PATH` entry and _add_ the path to the `npm` binaries here.
> Usually, these are found at `C:\Program Files\nodejs`.
> If you browse here with your `File Explorer`, you should find `node.exe`, `npm.bat` and `npx.bat`.
>
> Close any open terminals and open a new one.

## Assignment Requirements

Please follow [these instructions][cli-walkthrough] to download the Exercism CLI for your OS.

Once the CLI is set up and configured, download the first exercise - `hello-world`:

```shell
exercism download --exercise=hello-world --track=javascript
```

Each assignment then needs some tools to run the tests.
They can be installed running this command within each assignment directory:

```shell
npm install
```

> _**Help**_: `'<package>' is missing / cannot be found`
>
> If you see this after _upgrading_ your exercise, welcome to npm 7.
> Delete `node_modules` and `package-lock.json` and re-run the command to resolve this.

If you're concerned about disk space and are okay installing another tool, take a look at [pnpm](https://pnpm.io/), which ensure only one copy of each package-version is ever installed on disk.
In this case, run `pnpm install` instead of `npm install`, and everything should work as expected.

> **But what is npm and why does this work?**
>
> You don't need this information to complete the JavaScript track, but if you're eager to understand what just happened, the following paragraphs are for you:
>
> This works because `npm` is a package manager that comes bundled with Node.js, which has been installed per the steps above.
> The `npm` command looks for a `package.json` file, which is present in _each_ assignment folder.
> This file lists the `"dependencies"` above, which are then downloaded by `npm` and placed into the `node_modules` folder.
>
> The scripts in the `package.json` use the binaries from the local `node_modules` folder, and it's these scripts that are used to run the tests, as listed in the `exercise` description.

[web-nodejs]: https://nodejs.org/
[web-nodejs-download]: https://nodejs.org/en/download/
[web-nodejs-package]: https://nodejs.org/en/download/package-manager/
[cli-walkthrough]: https://exercism.org/cli-walkthrough
