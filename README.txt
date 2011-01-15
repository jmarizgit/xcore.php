--------------------------------------------------------------------------------------------
XCORE PHP FRAMEWORK V0.1b                                          
--------------------------------------------------------------------------------------------
XCORE is a PHP framework with useful functions and a incredible debug 
system that makes easy and fun develop with this powerful language.

--------------------------------------------------------------------------------------------
1.1 INSTALLING
--------------------------------------------------------------------------------------------
Just place the "xcore" folder on the main directory of your project 
and on your "index.php" page call it using "require" or "include", 
ex:

include "xcore/php/xcore.php";
...

OBS: XCORE provide folders where you can put your own files if you 
prefer (css, js, img, swf).



--------------------------------------------------------------------------------------------
1.2 HOW TO USE
--------------------------------------------------------------------------------------------
After complete the instalation (1.1) you can start to use XCORE simple by creating new
objects using the available classes inside the "xcore/php/" folder. 

Examples: 

//Connection with a database
$data = new Database(1,1); //1,1 are optional arguments, the first one initialize the embebed
debug system and the second one activate the php default debug.


If the connection variables inside the Database class are correct you should be connected 
with a database of your choice (see "xcore/php/Database/Database.class.php").


//Showing the website/system title name
$configure = new Configure(); //no debug this time
echo $configure->title; //should display the XCORE default title


//Showing your own title
$configure->title = "My web project title"; //set your own title name
echo $configure->title; //should display your own title name now



--------------------------------------------------------------------------------------------
3. VERSION
--------------------------------------------------------------------------------------------
V0.1b, 01-11-2011

--------------------------------------------------------------------------------------------
AUTHOR
--------------------------------------------------------------------------------------------
Mariz Melo
mm@emoriz.com

--------------------------------------------------------------------------------------------
4. LICENSE
--------------------------------------------------------------------------------------------
XCORE is open source, license can be founded on the link below: 
http://creativecommons.org/licenses/by-sa/3.0/

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS 
OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF 
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, 
EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE 
GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING 
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
OF THE POSSIBILITY OF SUCH DAMAGE.
