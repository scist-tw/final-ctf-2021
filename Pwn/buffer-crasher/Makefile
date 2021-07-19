n=buffer-crasher
s=$n.c
d=home/$n
a=-fno-stack-protector -no-pie
all:
	gcc $s -o $d $a
	strip $d
clean:
	rm $d
