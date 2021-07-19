// -fno-stack-protector -no-pie

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>


struct Buf {
    char a[0x333];
    int b;
    long int c;
};

void b4ck() {
    system("/bin/sh");
}

int main(){
    setvbuf(stdout  , 0, 2, 0);
    setvbuf(stdin   , 0, 2, 0);
    setvbuf(stderr  , 0, 2, 0);   

    struct Buf buf;

    puts("Crash the buffer.");
    gets(buf.a);

    return 0;
}
