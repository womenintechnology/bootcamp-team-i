# FullStack Bootcamp

## Installation123

### Docker set up

Docker is an open-source containerization software that creates isolated environments to run an application. Hence, you develop, test, and run multiple applications on the same machine.

#### Linux:

On Linux you have to install Docker using comand line. See "Install Docker Engine" part in [Docker documentation](https://docs.docker.com/engine/install/ubuntu/). These three steps should be enough on Ubuntu:

```sh
$ sudo apt-get update
$ sudo apt-get install docker-ce docker-ce-cli containerd.io
```

To check if installation went correct run command:

```sh
$ sudo docker run hello-world
```

#### Mac:

Here are the procedures to install Docker on **macOS**:

1. Download [Docker desktop for Mac](https://hub.docker.com/editions/community/docker-ce-desktop-mac) and double-click the **.dmg** file you’ve saved. Then, drag and drop the **Docker** icon to your Applications folder.

2. Open your Applications folder and double-click docker.app. During the configuration process, you’ll be asked to enter your password.

3. Once the installation process is finished, you’ll see the docker menu in your desktop’s status bar.

#### Windows Pro/Enterprise:

Here’s how you can install Docker on **Windows 10 64-bit**:

1. Check if your Windows fulfill [requirements](https://docs.microsoft.com/pl-pl/virtualization/hyper-v-on-windows/quick-start/enable-hyper-v?redirectedfrom=MSDN#check-requirements). Make sure that you have Enabled [Hyper-V](https://docs.microsoft.com/pl-pl/virtualization/hyper-v-on-windows/quick-start/enable-hyper-v?redirectedfrom=MSDN#enable-the-hyper-v-role-through-settings) in your system.

2) Downoload [Docker desktop for Windows 10](https://hub.docker.com/editions/community/docker-ce-desktop-windows).
   Then open the Docker for **Windows Installer** file.

3) In the **Configuration** dialog window, check or uncheck the boxes based on your preferences. Click **Ok**.

4) Once the installation is finished, hit Close. You’ll see the Docker icon in the taskbar.

### Run your docker-compose.yml

In you project directory `full-stack-bootcamp/` run comand:

```sh
$ docker-compose up
```

### visit http://localhost:8000

#### Windows 10 Home

First you need to update your Windows 10 Home to 19018+ version. You can check your version by typing into Windows search bar `About your PC` and hit enter. Than scroll to `Windows specification` and check the version number. To update your version simply type (also in windows search bar) `Check for updates` and hit enter.

If you still do not see there any new update, you can download update from this [website =>](https://www.microsoft.com/pl-pl/software-download/windows10)


When your Windows meet the first requirement you can now open Power Shell in administrator mode and run command:

```
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```

Than enable the 'Virtual Machine Platform' optional component:

```
dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
```

Restart your machine to complete the WSL install and update to WSL 2.

Now you can set WSL 2 as your default version with command:

```
wsl --set-default-version 2
```

If you are stuck you can find more info in article: [Install docker on Win. =>](https://docs.microsoft.com/en-us/windows/wsl/install-win10)

Windows May 2020 Update includes the Windows Subsystem for Linux 2 (WSL 2), with a custom-built Linux kernel. Therefor you are able now to install Docker Desktop for Windows from [website =>](https://hub.docker.com/editions/community/docker-ce-desktop-windows/)

Install Docker Desktop and remember to check `Enable WSL 2 Windows Features` checkbox.

If you have still problems download and install the latest WSL2 Linux kernel update package for x64 machines. [Updating the WSL 2 Linux kernel =>](https://docs.microsoft.com/en-us/windows/wsl/wsl2-kernel)

You can now run Docker Desktop. On the welcome screen you can see PowerShell command line (black window on the right side). Now type into it `New-Item -Path 'Workspace' -ItemType Directory` than `cd Workspace`
`git@github.com:womenintechnology/full-stack-bootcamp.git`.

What happened is that you have created a folder name `Workspace`, than you moved to that directory via change directory command, and the last thing you have cloned the repository. That is the all command line magic :).

You can find more PowerShell commands on the [Blog =>](https://blog.netwrix.com/2018/05/17/powershell-file-management/)

OK, now change directory one more time `cd full-stack-bootcamp` than run command `docker-compose up`.

That's it!

### visit http://localhost:8000

## Api

### Posts

To see list of posts visit http://localhost:8000/api/posts/{page}/{postsPerPage}.
Where {page} and {postsPerPage} are numbers. Those numbers are optional.
If you do not pass them (http://localhost:8000/api/posts) application will return first 10 posts for 1 page.
