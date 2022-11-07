from requests import get
from bs4 import BeautifulSoup



def test():
    file=open(f"test.txt","w")
    
    main_url = "https://www.kisa.or.kr/"
    keyword="20205?page="
    
    
    for i in range(1,4):
        file=open(f"test.txt","a")
        response = get(f"{main_url}{keyword}{i}")
        if not response.status_code == 200:
            print("Can't request the website!")
        else:
            soup = BeautifulSoup(response.text ,"html.parser")
            test = soup.find_all('td', class_="sbj txtL")
            for list1 in test:
                text=list1.find('a')
                file.writelines(text)
                file.write('\n')
            file.close()
        
def test2():
    
    main_url="https://www.kisa.or.kr/"
    keyword="20205?page="

    for i in range(1,4):
        file=open(f"test.txt","a")
        response=get(f"{main_url}{keyword}{i}")
        if not response.status_code == 200:
            print("Can't request the website!")
        else:
            soup = BeautifulSoup(response.text,"html.parser")
            test = soup.find_all('td',class_="sbj txtL")
            for list2 in test:
                text=list2.find('a')["href"]
                file.writelines("https://www.kisa.or.kr/")
                file.writelines(text)
                file.write('\n')
            file.close() 


test()
test2()

