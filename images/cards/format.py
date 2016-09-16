fin = open('cards.txt', 'r')

data = fin.read().splitlines()


for element in data:
    print('"' + element + '"' + ',')
