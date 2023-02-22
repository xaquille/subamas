# Import the library
import argparse
import os 
import json


# Create the parser
parser = argparse.ArgumentParser("exnmap.py -u google.com")
# Add an argument
parser.add_argument('-u', type=str, required=True)
# Parse the argument
args = parser.parse_args()
# Print "Hello" + the user input argument
print(args.u)
url = args.u
print(os.system('nmap -sV -T5 '+url+' -Pn -oX nmap/'+url+'.xml'))

#convert xml to json
searchploit = os.system('searchsploit nmap/'+url+'.xml -j > nmap/'+url+'.json &&  xsltproc nmap/'+url+'.xml -o nmap/'+url+'.html && rm nmap/'+url+".xml")
