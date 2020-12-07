in_x, in_y = input("Enter x, y. eg: 5 27\n").strip().split(" ")


def find_min_step(x, y):
    """Return min step between x, y when x become y.
    In one step x just eq x*2 or x-=1"""
    if x > y:
        exit(1)
    counter = 0
    for i in range(y):
        if y % 2 != 0:
            y += 1
            y = y / 2
            counter += 2
        else:
            y = y / 2
            counter += 1
        if y <= x:
            counter = counter + x - y
            break
    return int(counter)


print(find_min_step(int(in_x), int(in_y)))
