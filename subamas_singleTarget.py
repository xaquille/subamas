import os
import json


target='folder'
file1 = open(target+'.txt', 'r')
Lines = file1.readlines()
count = 0
# Strips the newline character
for line in Lines:
    count += 1
    domain = line.strip()
    print("kita mulai scan domain :"+domain)
    print("\n")
    os.system('amass enum -json '+domain+'.json -d '+domain)
    print("\n\nDomain sudah selesai")
    print("="*10)
    print("\n")
    print("perbaikin format json")
      
    # Read in the file for add coma
    with open(domain+'.json', 'r') as file :
        filedata = file.read()
    # Replace the target string add coma
        filedata = filedata.replace(']}', ']},')
        with open(domain+'.json', 'w') as file:
            file.write(filedata)
        
    #######################
    with open(domain+'.json', 'r+') as file :
        content = file.read()
        file_data = "["+content+"]"
        with open(domain+'.json', 'w') as file:
            file.write(file_data)

    # hilangkan koma pada line terakhir
        with open(domain+'.json', 'r') as file :
            filedata = file.read()
        # delete coma
            filedata = filedata.replace(']},\n]', ']}]')
            with open(domain+'.json', 'w') as file:
                file.write(filedata)
            
    # biar keliatan rapi
    with open(domain+'.json', 'r+') as file :
        file = file.read()
        file = json.loads(file)
        print(json.dumps(file, indent=3))