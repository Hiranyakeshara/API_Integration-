Instructions for Installing a Custom Module in WHMCS
Prerequisites:
WHMCS Installation: Ensure that WHMCS is installed and running on your server.
Access: You need administrative access to your WHMCS installation, including file upload permissions via FTP/SFTP or direct access to the server.

1. Create the Registrar Module
Create Directory:

Use your FTP client (like FileZilla) or the file manager on your web hosting control panel to navigate to the modules/registrars directory in your WHMCS installation.
Create a new folder named customRegistrar:

/path/to/whmcs/modules/registrars/customRegistrar/

Create PHP File:

Inside the customRegistrar folder, create a file named customRegistrar.php and paste the registrar code provided earlier.
2. Create the Addon Module
Create Directory:

Navigate to the modules/addons directory in your WHMCS installation.
Create a new folder named documentUpload:

/path/to/whmcs/modules/addons/documentUpload/
Create PHP File:

Inside the documentUpload folder, create a file named documentUpload.php and paste the addon module code provided earlier.
3. Create the Hook
Create Hook File:
Navigate to the root directory of your WHMCS installation.
Create a new file named hooks.php in the same directory and paste the hook code provided earlier.
4. Upload Required Files
If your module uses any specific libraries or dependencies, make sure to upload those files into the corresponding directories as needed.
5. Check Permissions
Ensure that the file permissions are set correctly. Typically, files should have permissions set to 644 and directories to 755.
6. Configure WHMCS
Log in to WHMCS:

Go to your WHMCS admin area (e.g., http://yourdomain.com/admin).
Activate the Registrar:

Navigate to Setup > Products/Services > Domain Registrars.
Look for Custom Registrar in the list and activate it.
Fill in any configuration fields necessary (like API key) based on the registrar code.
Activate the Addon:

Go to Setup > Addon Modules.
Find Document Upload in the list and activate it.
Enter any required settings (like the API key).
