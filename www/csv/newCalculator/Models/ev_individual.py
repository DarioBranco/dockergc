from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class ev_individual(Base):
	__tablename__ = 'ev_individual'
	id = Column(Integer, primary_key=True)
	EVID = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	Distance = Column(Text)
	MakeM = Column(Text)
